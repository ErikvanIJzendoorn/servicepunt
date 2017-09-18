<?php

define("HOST", "localhost");
define("DBNAME", "servicepunt");
define("USER", "root");
define("PASSWORD", "");

function connnectDB(){
	$connection = new PDO("mysql:host=$servername;dbname=tribalwarsstats", $username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

function login(){
	$stmt = connectDB().$connection->prepare("SELECT id, gebruikersnaam, wachtwoord FROM gebruiker");
	$stmt->execute();
}



?>