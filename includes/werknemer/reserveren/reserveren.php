<?php
session_start();

$persoon = [];
$select = [];
$aantal = [];

$persoon = $_SESSION['persoon'];
$select = $_SESSION['select'];
$aantal = $_SESSION['aantal'];
$werknemer = $_SESSION['id'];

$naam = $persoon[0][0];
$nummer = $persoon[0][1];
$borg = $persoon[0][2];
$ophaal = $persoon[0][3];
$inlever = $persoon[0][4];

$item1 = $select[0];
$item2 = $select[1];
$item3 = $select[2];
$item4 = $select[3];

$aantal1 = $aantal[0];
$aantal2 = $aantal[1];
$aantal3 = $aantal[2];
$aantal4 = $aantal[3];

require "../../../includes/database/connect.php";

try{
	$conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD

	$stmt = $conn->prepare("BEGIN;
=======
	if(empty($_SESSION['klantID']))
	{
		echo "Nieuwe Klant";

		$stmt = $conn->prepare("BEGIN;
							INSERT INTO `klant` (id, `naam`, `leerlingnummer`, `borg`) 
								VALUES (:klantID, :naam, :nummer, :borg);
>>>>>>> bdc413c41859e105691d0b930b64382707a24e4b
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product1, :reservering1, :aantal1);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product2, :reservering2, :aantal2);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product3, :reservering3, :aantal3);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product4, :reservering4, :aantal4);
							INSERT INTO reservering (id, product_reservering, werknemer, klant, inleverDatum, afhaalDatum, isActive)
<<<<<<< HEAD
								VALUES(:id, :product_reservering, :werknemer, :klant, :inlever, :ophaal, 1);
							COMMIT;
						   ");

	$stmt->bindValue(":product1", $item1);
	$stmt->bindValue(":product2", $item2);
	$stmt->bindValue(":product3", $item3);
	$stmt->bindValue(":product4", $item4);

	$stmt->bindValue(":aantal1", $aantal1);
	$stmt->bindValue(":aantal2", $aantal2);
	$stmt->bindValue(":aantal3", $aantal3);
	$stmt->bindValue(":aantal4", $aantal4);

	$stmt->bindValue(":reservering1", $_SESSION['reserveringID']);
	$stmt->bindValue(":reservering2", $_SESSION['reserveringID']);
	$stmt->bindValue(":reservering3", $_SESSION['reserveringID']);
	$stmt->bindValue(":reservering4", $_SESSION['reserveringID']);

	$stmt->bindValue(":id", $_SESSION['reserveringID']);
	$stmt->bindValue(":product_reservering", $_SESSION['reserveringID']);
	$stmt->bindValue(":werknemer", $werknemer);
	$stmt->bindValue(":inlever", $inlever);
	$stmt->bindValue(":ophaal", $ophaal);

	$stmt->bindValue(":klant", $_SESSION['klantID']);


	$stmt->execute();
=======
								VALUES(:id, :product_reservering, :werknemer, :klantID, :inlever, :ophaal, 1);
							COMMIT;
						   ");

		$stmt->bindValue(":product1", $item1);
		$stmt->bindValue(":product2", $item2);
		$stmt->bindValue(":product3", $item3);
		$stmt->bindValue(":product4", $item4);

		$stmt->bindValue(":aantal1", $aantal1);
		$stmt->bindValue(":aantal2", $aantal2);
		$stmt->bindValue(":aantal3", $aantal3);
		$stmt->bindValue(":aantal4", $aantal4);

		$stmt->bindValue(":reservering1", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering2", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering3", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering4", $_SESSION['reserveringID']);

		$stmt->bindValue(":id", $_SESSION['reserveringID']);
		$stmt->bindValue(":product_reservering", $_SESSION['reserveringID']);
		$stmt->bindValue(":werknemer", $werknemer);
		$stmt->bindValue(":inlever", $inlever);
		$stmt->bindValue(":ophaal", $ophaal);
		$stmt->bindValue(":klantID", $_SESSION['klantIDAantal']);

		$stmt->bindValue(":naam", $naam, PDO::PARAM_STR);
		$stmt->bindValue(":nummer", $nummer);
		$stmt->bindValue(":klantID", $_SESSION['klantIDAantal']);
		$stmt->bindValue(":borg", $borg, PDO::PARAM_STR);
		$stmt->execute();

		header("Location: http://localhost/servicepunt/includes/werknemer/overview.php");
		
	echo " End";

	} else{
		echo "else";
		$stmt = $conn->prepare("BEGIN;
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product1, :reservering1, :aantal1);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product2, :reservering2, :aantal2);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product3, :reservering3, :aantal3);
							INSERT INTO product_reservering (product, reservering, aantal)
								VALUES(:product4, :reservering4, :aantal4);
							INSERT INTO reservering (id, product_reservering, werknemer, klant, inleverDatum, afhaalDatum, isActive)
								VALUES(:id, :product_reservering, :werknemer, :klantID, :inlever, :ophaal, 1);
							COMMIT;
						   ");

		$stmt->bindValue(":product1", $item1);
		$stmt->bindValue(":product2", $item2);
		$stmt->bindValue(":product3", $item3);
		$stmt->bindValue(":product4", $item4);

		$stmt->bindValue(":aantal1", $aantal1);
		$stmt->bindValue(":aantal2", $aantal2);
		$stmt->bindValue(":aantal3", $aantal3);
		$stmt->bindValue(":aantal4", $aantal4);

		$stmt->bindValue(":reservering1", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering2", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering3", $_SESSION['reserveringID']);
		$stmt->bindValue(":reservering4", $_SESSION['reserveringID']);

		$stmt->bindValue(":id", $_SESSION['reserveringID']);
		$stmt->bindValue(":product_reservering", $_SESSION['reserveringID']);
		$stmt->bindValue(":werknemer", $werknemer);
		$stmt->bindValue(":inlever", $inlever);
		$stmt->bindValue(":ophaal", $ophaal);

		$stmt->bindValue(":klantID", $_SESSION['klantID']);
		$stmt->execute();

		header("Location: http://localhost/servicepunt/includes/werknemer/inleveren.php");
	}

	
	echo $_SESSION['klantID'];

>>>>>>> bdc413c41859e105691d0b930b64382707a24e4b

}
catch(Exception $e) {
    echo ($e);
}


?>