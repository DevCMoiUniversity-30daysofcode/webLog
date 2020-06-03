<?php
require 'includes/header.php'; // includes a header dynamicaly to the index page

// select blog entry to be displayed from the list of database entries order by date in descending order
	$query = "SELECT entries.*, categories.category FROM entries, categories
			 WHERE entries.cat_id = categories.id
			 ORDER BY date_posted DESC
			 LIMIT 1;";
	$result = $connection->query($query);
	if(!$result) die($connection->error);

// use the queried result to determine the number of rows from the query result
	$row = $result->num_rows;
// loop through the number of rows and output their content of the most rescent post
	for ($i=0; $i <$row ; ++$i) { 
		$result->data_seek($i);
		$row = $result->fetch_array(MYSQLI_ASSOC);


		// display the blog entry.
		echo "<h2><a href='view_entry.php?id=" . $row['id'] ."'>" . $row['subject'] . "</a></h2><br>";
		echo "<i> In <a href = 'view_cat.php?id=" . $row['cat_id'] . "'>" . $row['category'] . "</a>- posted on
		 " . date("D jS F Y g.iA", strtotime($row['date_posted'])) . 
		 "<i><br>";


		echo "<p>";
		echo nl2br($row['body']);
		echo "</p>";

		//display comments posted by visitors ordered by the most recent.
		$comments = "SELECT name FROM comments WHERE entry_id =" . $row['id'] ."
				    ORDER BY date_posted;";
		$result = $connection->query($comments);
		if(!$result) die($connection->error);

		$row = $result->num_rows;
		if($row == 0){
			echo "no comments to display";
		}else{
			echo "(<strong>" . $row . "</strong>) comments:";
			for ($i=0; $i <$row ; ++$i) { 
				$result->data_seek($i);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				echo "<a href = 'view_entry.php?id=" . $row['id'] . "#comment" .$i ."
					 '>" . $row['name'] . "</a>";
			}
			echo "</p>";
		}

		// display a list of previous posts made to the blog in the past order by their post dates with the most recent on the top.
		$prev_posts = "SELECT entries.*, categories.category FROM entries, categories
					   WHERE entries.cat_id = categories.id
					   ORDER BY date_posted DESC
					   LIMIT 1,5;";
		$result= $connection->query($prev_posts);
		$row = $result->num_rows;


		// if database query returns no row with the matching results, then there are no posts made previously, else show all the posts that match the query criteria.
		if($row == 0){
			echo "no previous posts!";
		}else{
			echo "<ul>";
			for ($i=0; $i < $row; $i++) { 
				$result->data_seek($i);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				echo "<li><a href = 'view_entry.php?id=". $row['id']. "'>"
				. $row['subject'] . "</a></li>";
			}	
		}
		echo "</ul>";
	}// close databse connection.
	$result->close();
	$connection->close();

//include blog footer.
require 'includes/footer.php';
?>