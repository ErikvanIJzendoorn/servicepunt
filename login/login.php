<?php
require '../includes/database/connect.php';

//-- Save datastring into variables --// 
$wachtwoord = $_POST['password'];
$gebruikersnaam = $_POST['username'];

// ----------------------------- Main Script ---------------------------\
try{
    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM werknemer");
    
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($result)) {
        echo ("Failed");
        $conn = null;

    }else{
        header("Location: http://")
        $conn = null;
    }
}catch(Exception $e) {
    echo ($e);
}

?>