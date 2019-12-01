<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Language" content="sr" />
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>Holiday Travel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link href="css\stil2.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/grid.css"> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="functions.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	</head>
	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50" onload="startTime()">
<nav  class="navbar navbar-default navbar-fixed-top">
  <div  class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" href="home.php"><span class="glyphicon glyphicon-globe"></span>HOLIDAY TRAVEL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="home.php">POČETNA</a></li>
        <li><a href="ponuda.php">PONUDA</a></li>
        <li><a href="rezervacijaAdmin.php">REZERVACIJE</a></li>
        <li><a href="onama.php">O NAMA</a></li>
       
      </ul>

      <ul class="nav navbar-nav navbar-right">
          <div class="korisnik">
        <?php
	if(isset($_SESSION["ID"]))
		// ako je neko ulogovan u gornjem desnom uglu se prikazuju podaci vezani za tog korisnika 
	{   
		?>

		
		<?php
		echo $_SESSION["tipKorisnika"]; echo " : ";
		echo $_SESSION["imeKorisnika"]; echo " ";
		echo $_SESSION["prezimeKorisnika"];
        ?>
        <?php
    }
    ?>

<?php
		// za izlogovanje ako se klikne dugme odjavi se	
		if (isset($_GET['logof'])) {
			unset($_SESSION["ID"]);
			unset($_SESSION["imeKorisnika"]);
			unset($_SESSION["prezimeKorisnika"]);
			unset($_SESSION["tipKorisnika"]);

      header("Location: login.php");
		}
		?>
    </div>
        <div allign="right" id="logout">
      <li><a href='rezervacijaAdmin.php?logof=izlogujSe'>ODJAVI SE</a></li>
</div>
    </div>
       
</ul>
    </div>
  </div>
</nav>


<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">Sve rezervacije</h3>
    
    

<div id="rezervacijaAdmin" name="rezervacijaAdmin">
    <?php include "ucitajRezervacijaAdmin.php"; ?>
</div>
    
    </div>
  </div>
</body>
<footer class="text-center" id="footer">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>&copy; 1990-2019. HOLIDAY TRAVEL</p> 
</footer>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        window.location.hash = hash;
      });
    } 
  });
})
</script>
</html>