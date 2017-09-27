<?php
require '../../../includes/database/connect.php';

//-- Save datastring into variables --// 

// ----------------------------- Main Script ---------------------------\
if(isset($_GET['id'])){

    $id = $_GET['id'];
    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE reservering SET isActive = '0' WHERE id = '$id'");
    
    $stmt->execute();

    header("Location: inleveren.php");
}

?>