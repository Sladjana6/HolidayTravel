 <?php
session_start();
include "konekcija.php";
if(isset($_POST['dugme'])){
    
    $drzava=$_POST['drzava'];
    $opis=$_POST['opis'];
    $cena=$_POST['cena'];
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $slika=$_SESSION['slika'];
    $korisnikId=$_SESSION["ID"];
    $adresa=$_POST['adresa'];
    
    $sql="INSERT INTO rezervacije (drzava, opis, slika, cena,ime,prezime,korisnikId, adresa) VALUES ('".$drzava."','".$opis."','".$slika."','".$cena."','".$ime."','".$prezime."','".$korisnikId."', '".$adresa."')";
        $mysqli->query($sql);

   header('Location: rezervacijaUser.php');
    
}

if(isset($_POST['id'])){
    $id=$_POST['id'];

$sql="SELECT * FROM ponuda WHERE id=$id";
$result=$mysqli->query($sql);
$row=$result->fetch_object();
}

?>
  <link rel="stylesheet" href="css/forma.css">  
   <div class="form-style-6">
    <h2><b>Rezerviši ponudu</b></h2>
   
<form action="rezervisiPonudu.php" method="post" style="background-image: url('<?php echo $row->slika ?>'); background-size: cover; ">
<input type="text" value="<?php echo $row->id ?>" name="idponude" hidden="hidden" />
<input type="text" name="drzava" value="<?php echo $row->drzava; ?>" />
<textarea name="opis" placeholder="Opis"><?php echo $row->opis; ?></textarea>
<input type="text" name="ime" value="<?php echo $_SESSION["imeKorisnika"];?>"/>
<input type="text" name="prezime" value="<?php echo $_SESSION["prezimeKorisnika"];?>"/>
<input type="text" name="adresa" value="<?php echo $_SESSION["adresa"];?>"/>
<input type="text" name="cena" value="<?php echo $row->cena; ?>" />
<?php $_SESSION["slika"]=$row->slika; ?>

<input type="submit" name="dugme" value="Potvrdi rezervaciju" />
</form>

</div>