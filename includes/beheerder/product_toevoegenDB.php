<?php
require '../../includes/database/connect.php';

//-- Save datastring into variables --// 

// ----------------------------- Main Script ---------------------------\

var_dump($_POST);
if(isset($_POST)){

    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO product (type,barcode,status,categorie,aantal,isActive)  VALUES (:productNaam,:productBarcode,1,:productCategorie,:productAantal,1)");

    $stmt->bindValue(":productNaam", $_POST['productNaam']);
    $stmt->bindValue(":productBarcode", $_POST['productBarcode']);
    $stmt->bindValue(":productAantal", $_POST['productAantal']);
    $stmt->bindValue(":productCategorie", $_POST['productCategorie']);
    
    $stmt->execute();
  
    header("Location: toevoegen.php");
}

?>
