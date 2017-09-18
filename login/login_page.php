<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="../assets/css/main.css">
	<link rel="stylesheet" href="../assets/css/login.css">
	<link rel="stylesheet" href="../assets/libs/materialize/css/materialize.min.css">
	<script rel="materialize" src="../assets/libs/materialize/js/materialize.min.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/main.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
	<div class="container">
		<center>
		<div class='row'>
	        <div class="z-depth-1 grey lighten-4 row formWrap">
                <form class="col s12 formDiv" method="post">

                <h5 class="orange-text text-accent-4 unselectable">Inloggen</h5>

                <div class='input-field col s12'>
                    <input class='validate' type='text' name='username' id='username'/>
                    <label class='unselectable' for='email'>Gebruikersnaam</label>
                </div>

                <div class='input-field col s12'>
                    <input class='validate' type='password' name='password' id='password' />
                    <label class='unselectable' for='password'>Wachtwoord</label>
                </div>

                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect orange accent-4 unselectable'>Login</button>
                </form>
            </div>
		</center>
		</div>
	</div>
</body>
</html>