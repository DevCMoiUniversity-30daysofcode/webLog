<?php
require 'config.php';
// db_connect
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
		if($connection->connect_error) die($connection->connect_error);
//NOTE: databse connection is done at the gheader so that connection to the DB is established whenever the header is included in any page.

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $config_web_name ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
</head>
<body>
	<!-- start header -->
	<div class="header">
		<h1><?php echo $config_web_name ?></h1>
		[<a href="index.php">Home</a>]
		[<a href="user.php">SignUp</a>]
		[<a href="login.php">Login</a>]
    </div>
    <!-- end header -->
    <!-- start main content area -->
    <div class="main">