<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Servicepunt:Overzicht</title>
		<link rel="stylesheet" href="../../../assets/css/main.css">
		<link rel="stylesheet" href="../../../assets/libs/materialize/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script rel="materialize" src="../../../assets/libs/materialize/js/materialize.min.js"></script>
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
			        <li class="bold"><a href="http://localhost/servicepunt/includes/werknemer/inleveren/inleveren.php" class="waves-effect waves-light white-text">Inleveren</a></li>
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
	                </tr>

<?php
	$k = 0;
	session_start();

	require '../../../includes/database/connect.php';
	try{

	    $conn = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare("SELECT inleverDatum, afhaalDatum, id, werknemer, klant FROM reservering WHERE isActive = 1");
	    
	    $stmt->execute();

	$klantInfo = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
		$id = $row['id'];
		$inleverDatum = $row['inleverDatum'];
		$afhaalDatum = $row['afhaalDatum'];
		$klant = $row['werknemer'];
		$werknemer = $row['klant'];

		$klantInf = array($id, $inleverDatum, $afhaalDatum, $klant, $werknemer);
		array_push($klantInfo, $klantInf);


    }    
    
	$arrayNumber = count($klantInfo);
	echo $arrayNumber;


    for($i = 0; $i < $arrayNumber; $i++)
    {	
    	$conn2 = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	    $conn2 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt2 = $conn2->prepare("SELECT product, aantal FROM product_reservering WHERE reservering = :id");
	    $stmt2->bindValue(":id", $klantInfo[$i][0]);
	    
	    $stmt2->execute();

		$productenId = [];
		while($rows2 = $stmt2->fetch(PDO::FETCH_ASSOC))
	    {
			$proid = $rows2['product'];
			$aantal = $rows2['aantal'];

			$productId = array($proid, $aantal);
			array_push($productenId, $productId);
	    }

		$conn4 = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	    $conn4 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt4 = $conn4->prepare("SELECT * FROM product WHERE status = 1");

	    $stmt4->execute();

		$producten = [];
		while($rows4 = $stmt4->fetch(PDO::FETCH_ASSOC))
	    {
			$type = $rows4['type'];
			$id = $rows4['id'];

			$product = array($id, $type);
			array_push($producten, $product);
	    }

	    $conn5 = new PDO("mysql:host=".host.";dbname=".database, dbUser, dbPass);
	    $conn5 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt5 = $conn5->prepare("SELECT naam FROM klant WHERE id = :klant");
	    $stmt5->bindValue(":klant", $klantInfo[$i][0]);

	    $stmt5->execute();

		while($rows5 = $stmt5->fetch(PDO::FETCH_ASSOC))
	    {
			$klantNaam = $rows5['naam'];
	    }

	//var_dump($productId);
	$boe = $productenId[$i][0];

	echo "<br>";

	var_dump($productenId);
	echo "<br>";
	echo "<br>";

	//var_dump($producten);
	?> 
				<tr>
					<td><?php echo $klantNaam; ?> </td>
					<td><?php print $producten[$productId[0]][1]; ?></td>
					<td><?php print $productenId[0][1]; ?></td>
					<td><?php echo $klantInfo[0][2]; ?></td>
					<td>Inleveren</td>
				</tr>
				<tr>
					<td></td>
					<td><?php print $producten[$boe][1];?></td>
					<td><?php print $productenId[1][1]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php print $producten[$boe][1]; ?></td>
					<td><?php print $productenId[2][1]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php print $producten[$boe][1]; ?></td>
					<td><?php print $productenId[3][1]; ?></td>
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