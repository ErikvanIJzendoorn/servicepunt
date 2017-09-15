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
		<title>Pinterest remake</title>
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/login.css">
		<link rel="stylesheet" href="assets/libs/materialize/css/materialize.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script rel="materialize" src="assets/libs/materialize/js/materialize.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script rel="register_modal" src="assets/js/register_info.js"></script>

    
 		<style>
	
			.input-field input[type=date]:focus + label,
			.input-field input[type=text]:focus + label,
			.input-field input[type=email]:focus + label,
			.input-field input[type=password]:focus + label {
				color: #00c853;
			}

			.input-field input[type=date]:focus,
			.input-field input[type=text]:focus,
			.input-field input[type=email]:focus,
			.input-field input[type=password]:focus {
				border-bottom: 1px solid #00c853 ;
			}
		</style>
	</head>

<body>
	<div class="section"></div>
	<main>
	
		<center>
			<h5 class="green-text text-accent-4 unselectable">Please, login into your account</h5>
			<div class="section"></div>

			<div class="container">
				<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

					<form class="col s12" method="post" style="text-align:left;">
						<div class='row'>
							<div class='col s12'>
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='email' name='email' id='email' style="margin-bottom: 0;" />
								<label class='unselectable' for='email'>Enter your email</label>
							</div>
						</div>

						<div class='row'>
							<div class='input-field col s12'>
								<input class='validate' type='password' name='password' id='password' />
								<label class='unselectable' for='password'>Enter your password</label>
							</div>
							<label style='float: right;'>
								<a class='red-text text-accent-4 unselectable' href='#!'><b>Forgot Password?</b></a>
							</label>
						</div>

						<center>
							<div class='row'>
								<button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect green accent-4 unselectable'>Login</button>
							</div>
						</center>
					</form>
				</div>
			</div>
			<a class=' btn green accent-4 unselectable' href="#register_modal">Create account</a>
			<?php
				require_once('includes/register_modal.php'); 
				//require_once('assets/includes/register_modal.php');
			?>
		</center>

		<div class="section"></div>
		<div class="section"></div>
	</main>
			
</body>
</html>