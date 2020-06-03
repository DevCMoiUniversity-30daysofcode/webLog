<?php
session_start();
require 'includes/config.php';

// connect to the database
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
	if($connection->connect_error) die($connection->connect_error);


	if(isset($_POST['name']) && isset($_POST['pwd'])){
		// querry the database to see if what has been entered by users are contained in the database.
		$querry = "SELECT * FROM logins WHERE username = '" . $_POST['name'] . "' 
				   AND password= '" . $_POST['pwd'] . "';";
		$result = $connection->query($querry);
		if(!$result) die($connection->error);

		// check to see the number of rows with matching results. which can be one or none.
		$row = $result->num_rows;
		// if one row matches user inputs the redirect them to the landing page (index.html) else the details are not correct.
		if($row == 1){
			header("location: profile.php");
		}else{
			echo "<div id= 'error-message' style = 'color: red'>sorry you did not enter the correct credentials</div>";
		}
		
		
	}
?>
<!-- login form -->
<form class="login.php" method="post">
	<table>
		<tr>
			<td><p>Username:</p></td>
			<td><p><input type="text" name="name" placeholder="username...."></p></td>
		</tr>
		<tr>
			<td><p>Password:</p></td>
			<td><p><input type="Password" name="pwd" placeholder="password..."></p></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit">login</button></td>
		</tr>
		</table>
</form>