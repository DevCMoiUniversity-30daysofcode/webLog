<?php
require 'includes/config.php';
	// validate get id
	
	if (isset($_GET['id']) == TRUE) {
		if(is_numeric($_GET['id']) == FALSE){
			$error = 1;
		}
		if($error ==1){
			header("location:" . $config_base_dir);
		}else{
			$validate_entry = $_GET['id'];
		}
	}else{
		$validate_entry = 0;
	}





	// cheking wether the submit button has been submited
	if($_POST['submit'] == TRUE){

		$name    = $_POST['name'];
		$comment = $_POST['comment'];

		$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
		if($connection->connect_error){

			die($connection->connect_error);
		}else{
			print "Successful";
		}

		// database query

		$query = "INSERT INTO comments(entry_id, date_posted, name, comment)
			      VALUES('$validate_entry', NOW(), '$name', '$comment')";
		$result = $connection->query($query);
		if(!$result) die($connection->connect_error);

		header("location: http: // " . $HTTP_HOST . $SCRIPT_NAME ."?id=" . $validate_entry);

		}else{
		//momentarily empty
	}









	require 'includes/header.php';
	// showing entries
	if($validate_entry ==0){
		$query = "SELECT entries.*, categories.category FROM entries, categories
			 WHERE entries.cat_id = categories.id
			 ORDER BY date_posted DESC
			 LIMIT 1;";
	}else{
		$query = "SELECT entries.*, categories.category FROM entries, categories
			 WHERE entries.cat_id = categories.id AND entries.id = $validate_entry
			 ORDER BY date_posted DESC
			 LIMIT 1;";
		$result = $connection->query($query);
		$row = $result->num_rows;

		for ($i=0; $i <$row ; $i++) { 
			$result->data_seek($i);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			echo "<h2>" . $row['subject'] . "</h2><br>";
			echo "<i> In <a href = 'view_cat.php?id =" . $row['cat_id'] . "'>"
				 . $row['category'] . "</a> - Posted on " . date("D jS F Y g.iA", strtotime($row['date_posted'])) . "</i>";
			echo "<p>";
			echo nl2br($row['body']);
			echo "</p>";
		}
		// displaying the coments
		$comments = "SELECT * FROM comments
		WHERE entry_id = $validate_entry
		ORDER BY date_posted DESC;";

		$result = $connection->query($comments);
		$row = $result->num_rows;
		if($row == 0){
			echo "<p>no comments</p>";
		}else{
			for ($i=0; $i <$row ; $i++) { 
				$result->data_seek($i);
				$row = $result->fetch_array(MYSQLI_ASSOC);


				echo "<a name ='comment" . $i . "'>";
				echo "<p> Comment by" . $row['name'] . " on " . date("D jS F Y g.iA", strtotime($row['date_posted'])) .
				"</p>";
				echo $row['comment'];
			}
		}
	}
?>
	<h4>leave a comment</h4>
	<form action="<?php $SCRIPT_NAME = 'view_entry.php'; echo $SCRIPT_NAME . "?id=" . $validate_entry; ?>" method="post">
		<table>
			<tr>
				<td><p>Name:</p><p></td><td><input type="text" name="name" placeholder="name.."></p></td>
			</tr>
			<tr>
				<td><p>Comment:</p></td><td><textarea name="comment" rows="3" cols="25"></textarea></p></td>
			</tr>
			<tr>
				<td><button type="submit" name="submit" style="border-radius: 10px; background-color: #13f2ea;">comment</button></td>
			</tr>
		</table>
	</form>
	
<?php
	require 'includes/footer.php';
?>