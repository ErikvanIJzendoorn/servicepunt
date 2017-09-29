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
			<ul id="nav-mobile" class="side-nav fixed grey accent-4 white-text">
		        <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/overview.php" class="waves-effect waves-light white-text active">Overzicht</a></li>
		        <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/toevoegen.php" class="waves-effect waves-light white-text">Producten toevoegen</a></li>
		        <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/verwijderen.php" class="waves-effect waves-light white-text">Producten verwijderen</a></li>
	    	</ul>
		</div>	
		<div class="col s10">
			 <table class="highlight" style=" background-color: white;">
                <tr class="orange accent-4 white-text">
                    <td>Naam</td>
                    <td>Product</td>
                    <td>Aantal</td>
                    <td>Afhaaldatum</td>
                    <td>Inleverdatum</td>
                    <td>Werknemer</td>
                </tr>
			<?php require_once('overzichttabel.php'); ?>
		</div>
	</div>
</body>
</html>