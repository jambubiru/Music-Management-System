<?php

//this is to establish connection to mysql database using pdo

session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "music";
$message = "";
try{
	$pdo = new PDO("mysql:host=$host; dbname=$database", $username, $password);

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

   catch(PDOException $error)
   {
   	$message = $error->getMessage();
   }


 ?>
