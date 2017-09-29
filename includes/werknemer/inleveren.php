<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Servicepunt:Overzicht</title>
		<link rel="stylesheet" href="../../assets/css/main.css">
		<link rel="stylesheet" href="../../assets/libs/materialize/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script rel="materialize" src="../../assets/libs/materialize/js/materialize.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>

	<body class="container">
		<div class="section"></div>
		<div class="row">
			<div class="col s2">
				<ul id="nav-mobile" class="side-nav fixed orange accent-4 white-text">
			        <li class="bold"><a href="http://localhost/servicepunt/includes/werknemer/overview.php" class="waves-effect waves-light white-text active">Overzicht</a></li>
			        <li class="bold"><a href="http://localhost/servicepunt/includes/werknemer/reserveren/reserveren_page.php" class="waves-effect waves-light white-text">Reserveren</a></li>
			        <li class="bold"><a href="http://localhost/servicepunt/includes/werknemer/Inleveren.php" class="waves-effect waves-light white-text">Inleveren</a></li>
		    	</ul>
			</div>	
			<div class="col s10">
				<table class="highlight" style=" background-color: white;">
	                <tr class="orange accent-4 white-text">
	                    <td>Naam</td>
	                    <td>Product</td>
	                    <td>Aantal</td>
	                    <td>Inleverdatum</td>
	                    <td>Inleveren</td>

	                    <td>active</td>
	                </tr>
				<?php
					require '../../includes/database/connect.php';
					try{
					    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
					    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					    $stmt = $conn->prepare("SELECT id,isActive AS active, inleverDatum, (SELECT naam FROM klant WHERE klant.id = reservering.klant) AS naam, 
					                                (SELECT type FROM product WHERE product.id = reservering.product_reservering) AS product, 
					                                (SELECT aantal FROM inventaris WHERE inventaris.product = reservering.product_reservering) AS aantal
					                                FROM reservering "
					        );
					    
					    $stmt->execute();

				    while($rows = $stmt->fetch(PDO::FETCH_ASSOC))
				    {
		        	?>

	                <tr>
	                    <td><?=$rows["naam"]?></td>
	                    <td><?=$rows["product"]?></td>
	                    <td><?=$rows["aantal"]?></td>
	                    <td><?=$rows["inleverDatum"]?></td>

	                    <td><a href='delete.php?id=<?php echo $rows["id"];?>'>Inleveren</a></td>
	                    <td><?=$rows["active"]?></td>
	                </tr>
			        
		            <?php
				    }    
				?> 
				</table>
				<?php
					}
					catch(Exception $e) {
					   
					}

				?>
			</div>
		</div>
	</body>
</html>