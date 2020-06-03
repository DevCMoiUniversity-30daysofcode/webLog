<?php
	require 'includes/header.php';

	// reasing the user inputs to new variables
		$u_name = $_POST['name'];
		$pwd 	= $_POST['pwd'];
		$c_pwd  = $_POST['c_pwd'];


		// see if all form vields have values, and if the values are all captured, then authenticate the values to ensure that they are all entered corectly.
		if(isset($u_name) && isset($pwd) && isset($c_pwd)){

			if($pwd != $c_pwd){
				$error[] = "<p style = 'color: red'>Error! your passwords did not match</p>";
				print $error[0];
			}else{
				// check for the minimun string length for the password
				$pass_len = strlen($pwd);
				if($pass_len < 6){
					$error[] = "<p style = 'color: red'>password must be at least 6 characters</p>";
					print $error[0];
				}
			}
			//check if minimun string length for username has been met.
			$name_len = strlen($u_name);
			if($name_len > 20){
				$error[] = "<p style = 'color: red '> username too long</p>";
				print $error[0];
			}
			// if there are no errors captured in the username and password entered, then proceed to insert the user credentials into the databse, or if any error has been captured notify the user of the said error for their correction.
			if($error == 0 ){
				$query = "INSERT INTO logins(username, password)
							VALUES('$u_name', '$pwd');";
				$result = $connection->query($query);
				if(!$result){
					die($connection->error);
				}else{
					echo "<p style = 'color: red'>you have been signed up successfully login <a href = 'login.php'>here</a></p>";
				}
			}
		}

?>

<form action="user.php" class="user.php" method="post">
	<table>
		<th>SIGN UP:</th>
		<tr>

			<td><p>Username:</p></td>
			<td><p><input type="text" name="name" required="required" placeholder="username...."></p></td>
		</tr>
		<tr>
			<td><p>Password:</p></td>
			<td><p><input type="Password" name="pwd" required="required" placeholder="password..."></p></td>
		</tr>
		<tr>
			<td><p>confirm Password:</p></td>
			<td><p><input type="Password" name="c_pwd" required="required" placeholder="password..."></p></td>
		</tr>
		<tr>
			<td></td>
			<td><button type="submit" name="submit">SignUp</button></td>
		</tr>
		</table>
</form>