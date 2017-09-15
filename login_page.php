<?php
	if(isset($_POST['email']) && isset($_POST['password'])){
		if($_POST['email'] !='' && $_POST['password'] != ''){
			require_once('includes/db_connections/db_connections.php');
			$data = getUserData();
			foreach($data as $response){
				echo "<br /><br />";
				if($_POST['email'] == $response['email'] && $_POST['password'] == $response['password']){
					header("Location: overview.php");
					exit();
				}
			}
		}
	}
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Servicepunt:Login</title>
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/login.css">
		<link rel="stylesheet" href="assets/libs/materialize/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script rel="materialize" src="assets/libs/materialize/js/materialize.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script rel="register_modal" src="assets/js/register_info.js"></script>
 		<style>
			body{
				background-color: #1a1a27;
			}

			.form{
				background-color: 5d5d79;
			}
		</style>
	</head>

<body>
	<div class="section"></div>
	<main>
		<center>
		
		<div class="section"></div>

		<div class="container" style="margin-top: 100px;">
			<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

				<form class="col s12" method="post" style="text-align:left; width: 300px;">

				<h5 class="green-text text-accent-4 unselectable">Inloggen</h5>
					<div class='row'>
						<div class='col s12'>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='text' name='username' id='username' style="margin-bottom: 0;" />
							<label class='unselectable' for='email'>Gebruikersnaam</label>
						</div>
					</div>

					<div class='row'>
						<div class='input-field col s12'>
							<input class='validate' type='password' name='password' id='password' />
							<label class='unselectable' for='password'>Wachtwoord</label>
						</div>
						<!-- <label style='float: right;'>
							<a class='red-text text-accent-4 unselectable' href='#!'><b>Forgot Password?</b></a>
						</label> -->
					</div>

					<center>
						<div class='row'>
							<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect green accent-4 unselectable'>Login</button>
						</div>
					</center>
				</form>
			</div>
		</div>
		</center>
	</main>		
</body>
</html>