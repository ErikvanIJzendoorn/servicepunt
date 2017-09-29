<?php
require '../../includes/database/connect.php';

//-- Save datastring into variables --// 

// ----------------------------- Main Script ---------------------------\
try{
    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT isActive,inleverDatum, afhaalDatum, (SELECT naam FROM klant WHERE klant.id = reservering.klant) AS naam, 
                                (SELECT type FROM product WHERE product.id = reservering.product_reservering) AS product, 
                                (SELECT gebruikersnaam FROM werknemer WHERE werknemer.id = reservering.werknemer) AS werknemer, 
                                (SELECT aantal FROM inventaris WHERE inventaris.product = reservering.product_reservering) AS aantal
                                FROM reservering "
        );
    
    $stmt->execute();

    while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($rows);
        if ($rows["isActive"] == 1) {
            ?>

                <tr>
                    <td><?=$rows["naam"]?></td>
                    <td><?=$rows["product"]?></td>
                    <td><?=$rows["aantal"]?></td>
                    <td><?=$rows["afhaalDatum"]?></td>
                    <td><?=$rows["inleverDatum"]?></td>
                    <td><?=$rows["werknemer"]?></td>
                </tr>
        
            <?php


        }else if($rows["isActive"]==0){

        }
       

    }    
    ?> </table><?php
}
catch(Exception $e) {
   
}

?>