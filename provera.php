<?php

if (!isset ($_GET["korisnicko_ime"])){
	echo "Korisnicko ime nije prosleđeno!";
} else {
	$korisnicko_ime=$_GET["korisnicko_ime"];
	include "konekcija.php";
    // u bazi u tabeli korisnik proverava da li vec postoji takav username
	$sql="SELECT * FROM korisnik WHERE username='".$korisnicko_ime."'";
	$rezultat = $mysqli->query($sql);
	if ($rezultat->num_rows!=0){
		echo "0";
	} else {
		echo "1";
	}
	$mysqli->close();
}
?>