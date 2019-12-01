<?php
//definiše se mime type
header("Content-type: application/xml");
//konekcija ka bazi
require_once "konekcija.php";
//priprema upita
$sql="SELECT * FROM polasci ORDER BY id ASC";
//kreiranje XMLDOM dokumenta
$dom = new DomDocument('1.0','utf-8');

//dodaje se koreni element
 $polasci = $dom->appendChild($dom->createElement('polasci'));

//izvršavanje upita
if (!$q=$mysqli->query($sql)){
//ako se upit ne izvrši
  //dodaje se element <greska> u korenom elementu <polasci>
 $greska = $polasci->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Došlo je do greške pri izvršavanju upita"));
} else {
//ako je upit u redu
if ($q->num_rows>0){
//ako ima rezultata u bazi
$niz = array();
while ($red=$q->fetch_object()){
  //dodaje se element <polazak> u korenom elementu <polasci>
 $polazak = $polasci->appendChild($dom->createElement('polazak'));

 //dodaje  se <prevoznik> element u <polazak>
 $prevoznik = $polazak->appendChild($dom->createElement('prevoznik'));
 //dodaje se elementu <prevoznik> sadrzaj cvora
 $prevoznik->appendChild($dom->createTextNode($red->prevoznik));

 //dodaje  se <datum> element u <polazak>
 $datum = $polazak->appendChild($dom->createElement('datum'));
 //dodaje se elementu <datum> sadrzaj cvora
 $datum->appendChild($dom->createTextNode($red->datum));
}
} else {
//ako nema rezultata u bazi
  //dodaje se element <greska> u korenom elementu <polasci>
 $greska = $polasci->appendChild($dom->createElement('greska'));
 //dodaje se elementu <greska> sadrzaj cvora
 $greska->appendChild($dom->createTextNode("Nema unetih polazaka"));
}
}
//cuvanje XML-a
$xml_string = $dom->saveXML(); 
echo $xml_string;
//zatvaranje konekcije
$mysqli->close()
?>

