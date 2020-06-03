<?php
require 'includes/config.php';

if(isset($_GET['id']) == TRUE){
	if(is_numeric($_GET['id']) == FALSE){
		$error = 1;
	}
	if($error == 1){
		header("Location:" . $config_base_dir . "view_cat.php");
	}else{
		$validate_cat = $_GET['id'];
	}
}else{
	$validate_cat = 0;
}

require 'includes/header.php';
// query the database
	

	$query  = "SELECT * FROM categories";
	$result = $connection->query($query);
	if(!$result) die($connection->error);

	$row = $result->num_rows;

	for ($i=1; $i < $row; $i++) { 
		$result->data_seek($i);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		// check each row and see if $validate_cat is the same as the id variable , this means that the category is curently selected.
		if($validate_cat == $row['id']){
			$select_entries = "SELECT * FROM entries WHERE cat_id = '$validate_cat'
			ORDER BY date_posted DESC;";
			$result = $connection->query($select_entries);

			$row = $result->num_rows;

			echo "<ul>";
			if($row == 0){
					echo "<li>No entries</li>";
			}else{
				// display rows

				for ($i=0; $i < $row; $i++) { 
					$result->data_seek($i);
					$row = $row = $result->fetch_array(MYSQLI_ASSOC);

					echo "<li>" . date("D jS F Y g.iA", strtotime($row['date_posted'])) . 
					"- <a href = 'view_entry.php?id=" . $row['id'] . "'>" . $row['subject'] . "</a></li>";
				}
			}
				echo "</ul>";
		}else{
			echo "<a href = 'view_cat.php?id=" . $row['id'] . "'>" . $row['category'] . "</a><br>";
		}
	}
require 'includes/footer.php';
?>