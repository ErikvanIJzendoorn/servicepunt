<?php
	define("HOST", "localhost");
	define("DBNAME", "social_media");
	define("USER", "root");
	define("PASSWORD", "");



	function getUserData () {
		$dbh = connectDB ();
		$sql = 'SELECT * FROM user';
		$result = $dbh->query($sql);

		$data = [];

		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		  	array_push($data, $row);
		}
		return $data;
	}

	function createUser($username,$password,$email){
		$dbh = connectDB ();
		$sql = $dbh->prepare('INSERT INTO user (name,password,email) VALUES ("'.$username.'","'.$password.'","'.$email.'")');
		$sql->execute();

		$data = [];
	

	}

	function connectDB() {
		return $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
	}
?>