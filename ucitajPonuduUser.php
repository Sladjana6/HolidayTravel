 <?php 
	include "konekcija.php";
          if(isset($_POST['cena'])){
          $sortiraj=$_POST['cena'];
           if(!empty($sortiraj)){
           $part1=" ORDER BY cena $sortiraj";
           }else {$part1="";}
       }else{ $part1="";}

       
$part2= "SELECT * FROM ponuda";
            
 $sql=$part2.$part1;
    $sql1="SELECT COUNT(*) AS REDOVA FROM ponuda";
$result=$mysqli->query($sql);
    $result1=$mysqli->query($sql1);
 $row1=$result1->fetch_object();
    $br=0;
    $br1=0;
?>

   <?php
    
	 while($row=$result->fetch_object()){
         $br++;
         $br1++;
         if($br>3){$br=1;}
         if($br!==1){
         ?> 

        
         <div class="col-md-4" id="kolona">
         	<img  src="<?php echo $row->slika; ?>" class="profil" alt="" id="sl">
         	<br>
         	<h4 id="naz"><?php echo $row->drzava ?></h4>
         	<br>
                    
               
                    <p id="opis"><?php echo $row->opis ?></p>
                    <br>

                    <?php
//Zameniti URL putanjom serverskog dela REST servisa
$url = 'http://localhost/Aplikacija/server.php';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
// ucitavanje SimpleXML objekta
// prvi parametar se odnosi na XML koji se ucitava, drugi parametar prosleduje dodatne opcije, a treci parametar je true ako se XML uzima
// iz URL-a (eksterni XML fajl), a false ukoliko se XML uzima iz string promenljive
$polasci = new SimpleXMLElement($curl_odgovor,null,false);
if (property_exists($polasci,"greska")){
echo ($polasci->greska);
} else {
// ako nema greske, generise se tabela
?>
<table class="tabela">
<tr>
<td>Prevoznik</td>
<td>Datum</td>
</tr>
<?php
foreach ($polasci as $p){
// prolazi se kroz cvorove XML dokumenta i cvorovi se prikazuju u tabeli
?>
<tr>
<td><?php echo $p->prevoznik;?></td>

<td><?php echo $p->datum;?></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
             	
         	<p class="cena"><b>Cena: <?php echo $row->cena; ?> EUR</b></p>
         	<br><br>
           <a href="#" id="rezervisi" onclick="rezervisiPonudu(<?php echo $row->id; ?>)">Rezerviši</a>
           
         </div>
           
            
            <style type="text/css">
                #ponuda{
                  width: 100%;
                  margin-left: -10%;
                        }
                #opis{ text-align:justify;
                padding-left: 10px;
                padding-right: 10px;
                margin-left: 15%;
                font-size: 90%;
                font-family: Cambria;


                }
                .cena{
                    padding-top: 5px;
                    padding-left: 10px;
                    color: rgb(121, 22, 80);
                    font-family:Cambria;
                    float: left;
                    width: 200px;
                    margin-left: 15%;
                    
                }
                #sl{
                    padding-left: 15%;
                    width: 400px;
                    height: 150px;
                   
                }
                
                #naz{
                    text-align: center;
                    padding: auto;
                    color: #f04242;
                    margin-top: 7%;
                    margin-left: 15%;
                    color: rgb(121, 22, 80);
                    
                }
                #rezervisi{
                   float: left;
                    text-decoration: none;
                    display: block;
                    padding: 5px 20px;
                    margin-left: 10px;
                    color: white;
                    background-color: rgb(121, 22, 80);;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                    margin-left: 15%;
                }
                #rezervisi:hover{
                     background-color: rgb(158, 75, 113);
                    
                }
              
                
                #funkc{
                    width: 80%;
                    margin-left: 10%;
                    margin-bottom: 5%;
                    padding-top: 50px;
                }
                #funkc select{
                    color: #fff;
                    width: 250px;
                    height: 30px;
                    font-size: 80%;
                    background-color: #f04242;
                    border-radius: 10px;
                }

                #kolona{
                    width:50%;
                    padding-left:10%;
                    padding-top:5%;
                }
                #red{
                    width:1000px;
                    height:500px;
                    
                }
                .tabela{
                    margin-left:30%;
                }

                .tabela td{
                    padding:0 15px 0 15px;
                }
                
                
                
                #ordersel{
                    float: right;
                    margin-right: 10%;
                }

            </style>
			
         
	<?php } else{ ?>
 <script src="resources/js/functions.js" type="text/javascript"></script>
             <div class="row" id="red">
             
             <div class="col-md-4"  id="kolona">
         	<img  src="<?php echo $row->slika; ?>" class="profil" alt="" id="sl">
         	<br>
         	<h4 id="naz"><?php echo $row->drzava ?></h4>
         	<br>
                   
                
                    <p id="opis"><?php echo $row->opis ?></p>
                    <br>

                    <?php
//Zameniti URL putanjom serverskog dela REST servisa
$url = 'http://localhost/Aplikacija/server.php';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
// ucitavanje SimpleXML objekta
// prvi parametar se odnosi na XML koji se ucitava, drugi parametar prosleduje dodatne opcije, a treci parametar je true ako se XML uzima
// iz URL-a (eksterni XML fajl), a false ukoliko se XML uzima iz string promenljive
$polasci = new SimpleXMLElement($curl_odgovor,null,false);
if (property_exists($polasci,"greska")){
echo ($polasci->greska);
} else {
// ako nema greske, generise se tabela
?>
<table class="tabela">
<tr>
<td>Prevoznik</td>
<td>Datum</td>
</tr>
<?php
foreach ($polasci as $p){
// prolazi se kroz cvorove XML dokumenta i cvorovi se prikazuju u tabeli
?>
<tr>
<td><?php echo $p->prevoznik;?></td>

<td><?php echo $p->datum;?></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
             	
         	<p class="cena"><b>Cena: <?php echo $row->cena; ?> EUR</b></p>
           <br><br>
           <a href="#" id="rezervisi" onclick="rezervisiPonudu(<?php echo $row->id; ?>)">Rezerviši</a>
            </div>
            
        <?php }
         if($br==3 or $br1==$row1->REDOVA){
             ?>
                </div>
         <?php } 
         
         
     } ?>
 
     <?php
    $mysqli->close();
?>

