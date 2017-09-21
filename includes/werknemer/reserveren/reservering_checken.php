<?php
session_start();

$persoon = [];
$naam = $_POST['klantNaam'];
$nummer = $_POST['klantNummer'];
$borg = $_POST['klantBorg'];
$ophaal = $_POST['klantOphaal'];
$inlever = $_POST['klantInlever'];

$persoonsGegevens = array($naam, $nummer, $borg, $ophaal, $inlever);
array_push($persoon, $persoonsGegevens);

$_SESSION['persoon'] = $persoon;

try{

	$select = [];
	$aantal = [];
	$k = 100;

	for($i = 0; $i != 4; $i++)
	{
		$k--;
		$select[$i] = $_POST[$i];
		$aantal[$i] = $_POST[$k];
	}

	var_dump($select);
	echo "<br>";
	var_dump($aantal);


	require "../../database/connect.php";

	$conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("SELECT * FROM product");

	$stmt->execute();
	$succes = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		for($i = 0; $i != 4; $i++)
		{
			if ( $select[$i] == $row['id'] )
			{
				if( $aantal[$i] < $row['aantal'] )
				{
					$succes++;
				}
				else{
					echo $aantal[$i];
					echo $row['aantal'] . "  <br>";
				}
			}
		}
	}
	if ($succes == 4)
		{	
			require "reserveren.php";
			header("Location: reserveren.php");
			echo '4';
		}
		else{
			echo 'nope ';
			echo $succes;
		}


}
catch(Exception $e) {
    echo ($e);
}

?>