<!DOCTYPE html>
	<html>
	<head lang="en">
        <title>Holiday travel</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="static/download/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
	    <link rel="stylesheet" href="css/main.css">
		<script type="text/javascript" src="provera.js"></script>
	</head>
	<body class="container-fluid">
    <nav class="navbar">
			<div class="navbar-header">
			  <a class="navbar-brand" href="login.php"><span class="glyphicon glyphicon-globe"></span> Holiday travel</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			  <li><a id="signup-href" href="#"><span class="glyphicon glyphicon-user"></span> Registruj se</a></li>
			  <li><a id="login-href" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Uloguj se</a></li>
			</ul>
		</nav>
		<?php
		session_start();
		?>
        <div class="row content">
			<form action="register.php" method="post" class="form-style-6">
				Korisnicko ime: <input type="text" name="username1"  id="ime" onblur="proveri(document.getElementById('ime').value)"><div  id="user"></div>
				Lozinka: <input type="text" name="password1"><br>
				Ime: <input type="text" name="ime1"><br>
				Prezime: <input type="text" name="prezime1"><br>
				Adresa: <input type="text" name="adresa1"><br>
				Broj telefona: <input type="text" name="brTel1"><br>

				<input type="submit" value="Registruj se">
			</form>
        </div>

		<?php
		// za kreiranje novog korisnika ako su u formi za registraciju uneti svi potrebni podaci
		if(isset($_POST['username1'])&&isset($_POST['password1'])&&isset($_POST['ime1'])&&isset($_POST['prezime1'])&&isset($_POST['adresa1'])&&isset($_POST['brTel1']))
		{
			$url = 'http://localhost/Aplikacija/registracija.php?username2='.$_POST['username1'].'&password2='.md5($_POST['password1']).'&ime2='.$_POST['ime1'].'&prezime2='.$_POST['prezime1'].'&adresa2='.$_POST['adresa1'].'&brojtelefona2='.$_POST['brTel1'];
			$url = str_replace(' ', '+', $url);
			// za pozivanje servisa koji ce da ubaci novo registrovanog korisnika u bazu
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, false);
			$odg = curl_exec($curl);
			echo $odg;

			curl_close($curl);
		}
		?>

	</body>         	
	</html>