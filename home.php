<?php session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Language" content="sr" />
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<title>Holiday Travel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css\stil.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/grid.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    
<nav  class="navbar navbar-default navbar-fixed-top">

<div  class="container-fluid">
   
    
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-globe"></span>HOLIDAY TRAVEL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="home.php">POČETNA</a></li>

        <?php
        if($_SESSION["tipKorisnika"]=="admin"){

          $adresa='http://localhost/Aplikacija/ponuda.php';
          $adresa1='http://localhost/Aplikacija/rezervacijaAdmin.php';
          

        ?>
        <?php
        }
        ?>

<?php
        if($_SESSION["tipKorisnika"]=="user"){

          $adresa='http://localhost/Aplikacija/ponudaUser.php';
          $adresa1='http://localhost/Aplikacija/rezervacijaUser.php';
          

        ?>
        <?php
        }
        ?>

        <li><a href=<?php echo $adresa;?>>PONUDA</a></li>
        <li><a href=<?php echo $adresa1;?>>REZERVACIJE</a></li>
        <li><a href="onama.php">O NAMA</a></li>
        
      </ul>

      <ul class="nav navbar-nav navbar-right">
          <div class="korisnik">
        <?php
	if(isset($_SESSION["ID"])){
		// ako je neko ulogovan u gornjem desnom uglu se prikazuju podaci vezani za tog korisnika 
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
		// za izlogovanje ako se klikne odjavi se dugme	
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
      <li><a href='home.php?logof=izlogujSe'>ODJAVI SE</a></li>
</div>
</ul>
    </div>
</div>
  
</nav>
<div class="container-fluid"  style="background-color:#e6f0ff">
        <div class="row">

<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="slike/rim.jpg" alt="Slika" width="1700" height="700">
              
      </div>

      <div class="item">
        <img src="slike/Slika3.jpg" alt="Slika3" width="1700" height="700">
             
      </div>
    
      <div class="item">
        <img src="slike/Slika8.jpg" alt="Slika4" width="1700" height="700">
              
      </div>

      <div class="item">
        <img src="slike/Slika12.jpg" alt="Slika5" width="1700" height="700">
             
      </div>

      <div class="item">
        <img src="slike/london.jpg" alt="Slika6" width="1700" height="700">
              
      </div>

      <div class="item">
        <img src="slike/Slika7.jpg" alt="Slika7" width="1700" height="700">
             
      </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div id="astra" class="container text-center">
  <h3><b>HOLIDAY TRAVEL</b></h3>
  <p><em>Mi volimo da putujemo!</em></p>
  <p>Turistička agencija Holiday Travel se bavi organizovanjem kvalitetnih turističkih 
putovanja u zemlji i inostranstvu po najpovoljnijim cenama. Izaberite najpovoljniju ponudu, kao što su Last minute i First minute ponude.

Evropski gradovi, letovanje u Grčkoj ili Crnoj Gori, i odmor u nekoj od domaćih banja, izbor je Vaš.
Iskoristite priliku i putujte po najpovoljnijim cenama samo sa Holiday Travel-om.</p>
  <br>
  <div class="row">
    <p><b><h2>TOP PONUDA!</h2></b></p>
    <div class="col-sm-4">
      <p class="text-center"><strong>Kapadokija, Turska</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="slike/Slika2.jpg" class="img-circle person" alt="Slika" width="255" height="255">
      </a>
      <div id="demo" class="collapse">
        <p>Polasci: 13.5.2019, 1.6.2019, 25.7.2019.</p>
        <p>Pun pansion</p>
        <p>Cena: 415€</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Prag, Češka</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="slike/prague.jpg" class="img-circle person" alt="Slikaa" width="255" height="255">
      </a>
      <div id="demo2" class="collapse">
        <p>Polasci: 7.4.2019, 18.6.2019, 1.8.2019.</p>
        <p>Polu pansion</p>
        <p>Cena: 250€</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Etno selo Stanišići, BIH</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="slike/Slika13.jpg" class="img-circle person" alt="Slikaaa" width="255" height="255">
      </a>
      <div id="demo3" class="collapse">
        <p>Polasci: 23.3.2019, 2.4.2019, 19.5.2019.</p>
        <p>Jednodnevni izlet</p>
        <p>Cena: 1000 RSD</p>
      </div>
    </div>
    <br><br>
  </div>
    <div class="row">
    <p>Autobuski polasci
      <br>
Svi autobusi počev od 13.07.2019. polaze sa iste lokacije, sa 
južnog parkinga Kombank arene, ulaz iz bulevara Arsenija Čarnojevića 
(ulaz sa autoputa). 
<br>
<br>
Način plaćanja
<br>
Naše aranžmane možete platiti: gotovinski, platnim karticama, čekovima ili 
putem administrativne zabrane.
<br>
<br>
Važno
<br>
Podaci na našoj web stranici su informativnog karaktera. 
Zvanični su isključivo štampani programi putovanja sa cenovnikom, 
koji su sastavni deo ugovora o putovanju i dostupni su u našoj agenciji. 
<br>
<br>
HOLIDAY SERVIS - Akcija!!!
<br>
Za sve korisnike usluga Turističke agencije Holiday Travel odobrava se POPUST od 20% na usluge Holiday Servisa :
<br>
<p><span class="glyphicon glyphicon-ok"></span> Servis teretnih i putnickih vozila</p>
<p><span class="glyphicon glyphicon-ok"></span> Pregled i popravka vozila</p>
<p><span class="glyphicon glyphicon-ok"></span> Dijagnostika</p>
<p><span class="glyphicon glyphicon-ok"></span> Održavanje vozila</p>
<p><span class="glyphicon glyphicon-ok"></span> Vulkanizerske usluge</p>
<p><span class="glyphicon glyphicon-ok"></span> Pranje teretnih vozila</p>
<p><span class="glyphicon glyphicon-ok"></span> Remont dizni</p>
</p>
  </div>
</div>
</div>
</div>
</div>

<footer class="text-center">
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

</body>
</html>
