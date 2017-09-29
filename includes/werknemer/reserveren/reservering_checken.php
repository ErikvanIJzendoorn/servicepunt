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

	require "../../database/connect.php";

	$conn2 = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt2 = $conn2->prepare("SELECT  (
							    SELECT count(id)
							    FROM reservering
							    ) AS reserveringID,
							    (
							    SELECT id
							    FROM klant
							    WHERE naam = :naam
							    ) AS klantID
							");

	$stmt2->bindValue(":naam", $naam);

	$stmt2->execute();

	while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	{
		$klantID = $row2['klantID'];
		$reserveringID = $row2['reserveringID'] + 1;

		$_SESSION['reserveringID'] = $reserveringID;
		$_SESSION['klantID'] = $klantID;
	}

	$conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("SELECT * FROM product");

	$stmt->execute();

	$succes = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		for($i = 0; $i != 4; $i++)
		{
			if ( $select[$i] == $row['id'] )
			{
				if( $aantal[$i] <= $row['aantal'] )
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
			$_SESSION['select'] = $select;
			$_SESSION['aantal'] = $aantal;
			require "reserveren.php";
			header("Location: reserveren.php");
		}
		else{
			var_dump($select);
			echo "<br>";
			var_dump($aantal);
			echo 'nope ';
			echo $succes;
		}


}
catch(Exception $e) {
    echo ($e);
}

?>