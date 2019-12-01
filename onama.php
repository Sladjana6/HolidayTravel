<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Language" content="sr" />
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <title>Holiday Travel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css\stil11.css" />
  
<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyBkkgcmHSIqfFW7JZQbpPqJ8-G-XHWeNxc&callback=initialize
"></script>
<script>  
function initialize(){

    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(45);
    var markers = [
        ['Balkanska 51', 44.808546, 20.458622],
        ['Strazilova', 44.762416, 20.481799],
        ['Obrenoviceva bb', 43.315356, 21.894667],
    ];

    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Balkanska 51</h3>' +
        '<p>Poslovnica 1</p>' +        '</div>'],
        ['<div class="info_content">' +
        '<h3>Stražilovska 27</h3>' +
        '<p>Poslovnica 2</p>' +        '</div>'],
        ['<div class="info_content">' +
        '<h3>Obrenovićeva bb</h3>' +
        '<p>Poslovnica 3</p>' +        '</div>'],
    ];

    var infoWindow = new google.maps.InfoWindow(), marker, i;
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
       
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        
        map.fitBounds(bounds);
    }
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(7);
        google.maps.event.removeListener(boundsListener);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
		<nav  class="navbar navbar-default navbar-fixed-top">
  <div  class="container-fluid">
    <div class="navbar-header">
    
      <a class="navbar-brand" href="home.php"> <span class="glyphicon glyphicon-globe"></span>HOLIDAY TRAVEL</a>
   
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
      <li><a href='onama.php?logof=izlogujSe'>ODJAVI SE</a></li>
</div>
</ul>

    </div>
  </div>
</nav>
<div class="sadrzaj" class="row">
		<p><br><br><br>
    <b><h3>~ O NAMA ~</h3></b></p>
		<p>Turistička agencija Holiday Travel osnovana je 1990. godine.

Članica smo IATA-e od samog osnivanja.
<br>
Konstantno napredujući, uspeli smo, na osnovu rezultata poslovanja - da se svrstamo u red vodećih turističkih agencija na našem tržištu. To smo postigli realizacijom ispravne poslovne politike koju sprovodi tim (60 stalno zaposlenih u agenciji i preko 80 kolega koji rade na terenu) u poslovnici koja je optimalno tehnički opremljena.
<br>
Sopstveni vozni park (trenutno - dvanaest modernih, turističkih autobusa, mini busevi i komforni automobili I klase za prevoz VIP gostiju), je izuzetna prednost koju znalački iskorišcavamo.
<br>
O našem ugledu rečito govori i podatak da više od 500 turističkih agencija prodaje aranžmane HOLIDAY TRAVEL-a, koji su kreirali naši komercijalisti. Stoga ne čudi podatak (za 2015. godinu) da je ova razgranata prodajna mreža opslužila oko 55.000 klijenata.
<br>
Naravno, da smo se intezivno uključili i u mnoge programe receptivnog turizma, u cilju da dostojno reprezentujemo našu zemlju, što bi trebalo da bude i osnovni cilj svih domaćih turističkih agencija. Upravo u tom kontekstu, organizovali smo u poslednjih par godina nekoliko kongresa i savetovanja, kao i kružne ture po Srbiji, što je na naše zadovoljstvo, ocenjeno kao veoma uspešno i čini nas gostoljubivim domaćinima. Dostojno smo priznati i od naših ino-partnera, koji su veoma zadovoljni što svake godine povecavamo obim poslovanja, a istovremeno unapredjujemo i kvalitet medjusobne saradnje.
<br>
Opremljeni smo najsavremenijim sistemom prodaje avio karata naših i svetskih kompanija koje su zastupljene na našem tržištu. Imajuci u vidu gore navedeno spremni smo za poslovnu saradnju ukljucujuci sve vidove organizacije putovanja u zemlji i inostranstvu, saradnju u posredovanju u prodaji avio karata svih svetskih kompanijam, kao i rezervacije smeštaja u hotelima svih kategorija u zemlji i svetu.
<br>
S poštovanjem
Holiday Travel </p>
<p>
  <br>
   

<p> <h4>Vremenska prognoza u Beogradu u narednih nekoliko dana:</h4> </p>
<br>
<br>
<?php
$url='api.worldweatheronline.com/premium/v1/weather.ashx?q=44.804%2C20.4651&format=json&num_of_days=4&key=368de6c159fb42d190c145832192102';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
$parsiran_json = json_decode ($curl_odgovor);
?>
<table class="tabela">
<tr>
<td>Datum</td>
<td> Minimalna temperatura</td>
<td> Maksimalna temperatura</td>
</tr>
<?php
for ($i=0; $i<4; $i++){
$tempMin = $parsiran_json->data->weather[$i]->mintempC;
$datum = $parsiran_json->data->weather[$i]->date;
$tempMax = $parsiran_json->data->weather[$i]->maxtempC;
?>
<tr>
<td><?php echo $datum;?></td> 

<td><?php echo $tempMin;?> *C.</td>

<td><?php echo $tempMax;?> *C.</td>
</tr>
<?php
}
?>
</table>


<div id="map-canvas"></div>

    <p>
      <br><br><br><br>
      <h4>Utisci drugih o nama:</h4>



<br><br>
    Zorica Cvetković 
    <br><br>
    <p><span class="glyphicon glyphicon-map-marker"></span> Beograd, Srbija</p>
      
    <p><span class="glyphicon glyphicon-envelope"></span> Email: zoka.zorica@mail.com</p>
Krit 28.6. - 08.07.2017
<br><br>
<p id="rcorners4">
Postovani, zelim da Vam se zahvalim za uspesno i profesionalno odradjen letnji turisticki aranzman naseg boravka na Kritu u "Hotelu NIKI'S" od 28.6. - 08.07.2017. za mene i mog supruga! Sve je bilo na vrhunskom nivou, od angazovanja oko leta avionom, preko sobe koju smo koristili na I. (prvom) spratu (broj 103) sa pogledom na more i setaliste - do odlicne i raznovrsne hrane na svedskom stolu za dorucak i veceru! Posebno bi pohvalila ljubaznost Vaseg osoblja (gospodju Ivanu na salteru na Aerodromu "Nikola Tesla", kao i srdacni pristup i korektnost vodica na Kritu gospodina Minje Vinkovica)! Nadamo se da ce se isto ovako lep odmor dogoditi i u Riminiju, gde putujemo od 05.08. - 12.08.2017. godine? Do sledeceg javljanja, puno pozdrava od Zorice Cvetkovic!</p>
<br><br><br><br>
    Dobrivoje Petrović 
    <br><br>
    <p><span class="glyphicon glyphicon-map-marker"></span> Pirot, Srbija</p>
      
    <p><span class="glyphicon glyphicon-envelope"></span> Email: petrovic.65@mail.com</p>
Klasicna Italija 03.05.-09.05.2017.
<br><br>
<p id="rcorners4">
Poštovani, Pohvaljujem skoro sve u vezi putovanja Klasicna Italija od 03. do 09.05.17. godine, a najviše fenomenalnog vodica Nemanju DOBRICA koji je u svemu ulepšao naše putovanje: predusretljiv, neobicno ljubazan, prepun informacija i znanja, rešavao sve probleme pa cak i zamenjene kofere sa putnicima druge grupe. Bio je fantastican i veoma je doprineo kvalitetu putovanja. Ne puštajte ga ni po koju cenu da napusti Vašu agenciju! Jedina zamerka je loš hotel u Montekatiniju i nošenje prtljaga nekoliko stotina metara jer bus nije mogao da pride hotelu. obavezno promenite taj hotel. Dobrivoje Petrovic iz Beograda.</p>
<br><br><br><br>
    Ivana Stanišić
    <br><br>
    <p><span class="glyphicon glyphicon-map-marker"></span> Užice, Srbija</p>
      
    <p><span class="glyphicon glyphicon-envelope"></span> Email: ivanica993@mail.com</p> 

Rim 03.05.-07.05.2017.
<br><br>
<p id="rcorners4">
Poštovani, putovala sam u Rim preko vaše agencije u periodu od 3. do 7.maja. Utisci su predivni. Veoma ste profesionalni i zato sam se osecala sigurno. Sve ste odlicno organizovali. Vodic Stevan je bio veoma zanimljiv, profesionalan i pristupacan. Hvala vam na ovom divnom iskustvu i nadam se daljoj saradnji. Pozdrav od Ivane Stanišic iz Kraljeva!</p>
</p>
<br><br><br>

<div id="map"></div>

<br>

<div class="row" id="poslovnice">
  <div class="col-sm-4" id="poslovnica1">
<p><h5><b>Poslovnica br. 1</b></h5>
<br><br>
<p><span class="glyphicon glyphicon-map-marker"></span> Beograd: Balkanska 51.</p>
      <p><span class="glyphicon glyphicon-phone"></span> Telefon: 011/5555-555</p>
      <p><span class="glyphicon glyphicon-envelope"></span> E-mail: infobg@astratravel.rs</p>

Radno vreme: Ponedeljak - Petak: 09:00 - 20:00, Subota, nedelja: 10:00 - 17:00
</div>
<div class="col-sm-4" id="poslovnica2">
       <h5><b>Poslovnica br. 2</b></h5>
<br><br>
<p><span class="glyphicon glyphicon-map-marker"></span> Beograd: Stražilovska 27.</p>
      <p><span class="glyphicon glyphicon-phone"></span> Telefon: 011/5555-555</p>
      <p><span class="glyphicon glyphicon-envelope"></span> E-mail: infons@astratravel.rs</p>

Radno vreme: Ponedeljak - Petak: 09:00 - 20:00, Subota, nedelja: 10:00 - 17:00
</div> 

<div class="col-sm-4" id="poslovnica3">
      <h5> <b>Poslovnica br. 3</b></h5>
       <br><br>
       <p><span class="glyphicon glyphicon-map-marker"></span> Niš: Obrenoviceva bb, lokal 17-P, Tržni centar "GORCA"</p>
      <p><span class="glyphicon glyphicon-phone"></span> Telefon: 011/5555-555</p>
      <p><span class="glyphicon glyphicon-envelope"></span> E-mail: infonis@astratravel.rs</p>

Radno vreme: Ponedeljak - Petak: 09:00 - 20:00, Subota, nedelja: 10:00 - 17:00
</div>
</p>
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
<style type="text/css">

#map{
    width: 100%;
    height: 400px;
}

.mapContainer{
    width:50%;
    position: relative;
}
.mapContainer a.direction-link {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 100010;
    color: #FFF;
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    line-height: 25px;
    padding: 8px 20px 8px 50px;
    background: #0094de;
    background-image: url('direction-icon.png');
    background-position: left center;
    background-repeat: no-repeat;
}
.mapContainer a.direction-link:hover {
    text-decoration: none;
    background: #0072ab;
    color: #FFF;
    background-image: url('direction-icon.png');
    background-position: left center;
    background-repeat: no-repeat;
}

</style>
</html>