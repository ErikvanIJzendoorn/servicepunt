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
				     <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/overview.php" class="waves-effect waves-light white-text active">Overzicht</a></li>
			        <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/toevoegen.php" class="waves-effect waves-light white-text">Producten toevoegen</a></li>
			        <li class="bold"><a href="http://localhost/servicepunt/includes/beheerder/verwijderen.php" class="waves-effect waves-light white-text">Producten verwijderen</a></li>
	    		</ul>
			</div>	
			<div class="col s10" id="form">
				<div class="row">
				    <form method="post" action="product_toevoegenDB.php">
						<div>
							<div class="input-field col s6 row textField">
					          <input id="first_name" type="text" class="validate" name="productNaam">
					          <label for="first_name">Naam product</label>
					        </div>

					        <div class="input-field col s6 row textField">
					          <input id="first_name" type="text" class="validate" name="productBarcode">
					          <label for="first_name">Barcode </label>
					        </div>

					        <div class="input-field col s6 row textField">
					          <input id="first_name" type="text" class="validate" name="productCategorie">
					          <label for="first_name">Categorie</label>
					        </div>

					        <div class="input-field col s6 row textField">
					          <input id="first_name" type="text" class="validate" name="productAantal">
					          <label for="first_name">Aantal</label>
					        </div>
						</div>
						<button class="btn waves-effect waves-light buttonMargin" type="submit">Verder
					    	<i class="material-icons right">send</i>
					    </button>
					</form>
				</div>	
			</div>
		</div>
	</body>
</html>