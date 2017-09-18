<?php
require '../includes/database/connect.php';

//-- Save datastring into variables --// 
$pass = $_POST['password'];
$user = $_POST['username'];

// ----------------------------- Main Script ---------------------------\
try{
    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM werknemer");
    
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if($row['gebruikersnaam'] == $pass && $row['wachtwoord'] == $user) {
            if($row['beheerder'] == 1)
            {
                header("Location: http://localhost/servicepunt/includes/beheerder/overview.php");
            }
            else{
                header("Location: http://localhost/servicepunt/includes/werknemer/overview.php");
            }
           

            $conn = null;
        }else{
            echo ("Failed");
            $conn = null;
        }
    }
}
catch(Exception $e) {
    echo ($e);
}

?>