<?php
		session_start();
		?>
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
			  <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe"></span> Holiday travel</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			  <li><a id="signup-href" href="register.php"><span class="glyphicon glyphicon-user"></span> Registruj se</a></li>
			  <li><a id="login-href" href="login.php"><span class="glyphicon glyphicon-log-in"></span> Uloguj se</a></li>
			</ul>
		</nav>
		
		<?php

		if(isset($_POST["username"])&&isset($_POST["password"]))
		// za logovanje pri unosenju username i password-a
		{
			$user= $_POST["username"];
			$pass= md5($_POST["password"]);
			
			include "konekcija.php";

			$sql= "SELECT * FROM korisnik WHERE username='".$user."' AND password='".$pass."' ";
			// provera da li su tacno uneseni username i password (da li postoji neko sa tim podacima)
			if (mysqli_num_rows($q=$mysqli->query($sql))>0){

				$row = $q->fetch_object();
				
				$_SESSION["ID"]= $row->korisnikId;

				$_SESSION["imeKorisnika"]= $row->ime;
				$_SESSION["prezimeKorisnika"]= $row->prezime;
				$_SESSION["tipKorisnika"]= $row->tip;
				$_SESSION["adresa"]= $row->adresa;


				header("Location:home.php");

				


			} else {
			
				
				$message = "Pogrešno ste uneli korisničko ime ili lozinku!! ";
				echo "<script type='text/javascript'>alert('$message');</script>";
				
			}
		}
		
		if(!isset($_SESSION["ID"]))
	    // ako nije postavljen $_SESSION["ID"] znaci da nije niko ulogovan i u tom slucaju se prikazuje forma za unosenje username i passworda
		{
            ?>
            <br><br><br>
	    <div class="row content">
	        <form action="login.php" method="post" class="form-style-6">
				Korisnicko ime: <input type="text" name="username"><br>
				Lozinka: <input type="password" name="password"><br>
				<input type="submit" value="Uloguj se">
			</form>
        </div>	

			

	<?php
	} else{
	
	
	}
	?>
	</body>         	
	</html>