<html>
	<head>
		<meta charset="utf-8">
		<title>Servicepunt:Overzicht</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="../../../assets/css/main.css">
		<link rel="stylesheet" href="../../../assets/libs/materialize/css/materialize.min.css">
		<script rel="materialize" src="../../../assets/libs/materialize/js/materialize.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="../../../assets/js/materialize.js"></script>
		<link rel="stylesheet" href="reserveren.css">
	</head>

	<header class="col s2">
		
	</header>	
<body>
	<div class="row col s12">
		<div class="col s2">
			<ul id="nav-mobile" class="navbar side-nav fixed orange accent-4 white-text">
		        <li class="bold"><a href="" class="white-text">Overzicht</a></li>
		        <li class="bold"><a href="reserveren_page.php" class="white-text">Reserveren</a></li>
		        <li class="bold"><a href="" class="white-text">Inleveren</a></li>
    		</ul>
		</div>
		
	<div class="col s6 offset-s2 mooi" id="form">
		<div class="row">
		    <form method="post" action="reservering_checken.php">
				<?php 
					$formSize = 4;
					$productAantal = 100;
					for($productNum = 0; $productNum < $formSize; $productNum+=2)
					{	
						$productAantal--;
						DrawSelect($productNum, $productAantal);
						$productAantal--;
						DrawSelect($productNum + 1, $productAantal);
					}
				?>

				
				<div>
					<div class="input-field col s6 row textField">
			          <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="klantNaam">
			          <label for="first_name">Naam</label>
			        </div>

			        <div class="input-field col s6 row textField">
			          <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="klantNummer">
			          <label for="first_name">Leerlingnummer</label>
			        </div>

			        <div class="input-field col s6 row textField">
			          <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="klantBorg">
			          <label for="first_name">Borg</label>
			        </div>
				</div>
				 <div class="col s12">
					<input type="text" placeholder="Ophaaldatum" class="datepicker col s4 offset-s1" name="klantOphaal">
					<input type="text" placeholder="Inleverdatum" class="datepicker col s4 offset-s2"  name="klantInlever">
				</div>
				<button class="btn waves-effect waves-light buttonMargin" type="submit" name="action">Verder
			    	<i class="material-icons right">send</i>
			    </button>
			</form>
		</div>	
	</div>
</div>
</body>
</html>

<?php
function DrawSelect($productNum, $productAantal)
{	
	print '<div class="col s6 productSelect">
			<div class="input-field col s6">
			    <select name="'; echo $productNum; print '">
		';
		    require "product_ophalen.php";
	print '
			    </select>
			</div>

		<div class="input-field col s2">
			<input placeholder="Aantal" id="first_name" type="text" class="validate" name="'; echo $productAantal; print '">
		</div>
		</div>

	';
}
	
?>