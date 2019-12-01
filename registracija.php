<?php
if (isset ($_GET['username2'])&&isset($_GET['password2']) && isset ($_GET['ime2']) && isset ($_GET['prezime2']) && isset ($_GET['adresa2']) && isset ($_GET['brojtelefona2']))
// u slucaju da su uneti svi parametri za registraciju 
{
$username = $_GET['username2'];
$password = $_GET['password2'];
$ime = $_GET['ime2'];
$prezime = $_GET['prezime2'];
$adresa = $_GET['adresa2'];
$brojtelefona = $_GET['brojtelefona2'];
$tip = "user";
if($username!=""&&$password!=""&&$ime!=""&&$prezime!=""&&$adresa!=""&&$brojtelefona!=""){
include "konekcija.php";
// ubacivanje novog korisnika u bazu (pri registraciji)



$sql="INSERT INTO korisnik (username,password,ime,prezime,adresa,brojtelefona,tip) VALUES ('".$username."', '".$password."', '".$ime."', '".$prezime."', '".$adresa."', '".$brojtelefona."', '".$tip."')";
if ($mysqli->query($sql)){
    $message = "Uspešno ste se registrovali! Molimo Vas da posetite stranicu za logovanje! ";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
} else {
    $message = "Došlo je do greške prilikom registracije!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
}else{
    
    $message = "Niste uneli sve podatke!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
}


} else {
    $message = "Parametri nisu prosledjeni!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

