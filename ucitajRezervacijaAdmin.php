 <?php 
	include "konekcija.php";
          if(isset($_POST['cena'])){
          $sortiraj=$_POST['cena'];
           if(!empty($sortiraj)){
           $part1=" ORDER BY cena $sortiraj";
           }else {$part1="";}
       }else{ $part1="";}

       
       $part2= "SELECT * FROM rezervacije";
            
 $sql=$part2.$part1;
    $sql1="SELECT COUNT(*) AS REDOVA FROM rezervacije";
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
         if($br==1){
         ?> 

      
         <div class="col-md-4" id="kolona">
         	<img  src="<?php echo $row->slika; ?>" class="profil" alt="" id="sl">
         	<br>
         	<h4 id="naz"><?php echo $row->drzava ?></h4>
         	<br>
                    
               
                    <p id="opis"><?php echo $row->opis ?></p>
                    <br>
             	
         	<p class="cena"><b>Cena: <?php echo $row->cena; ?> EUR</b></p>
             <br>
             <br>
           <p id="adresa">Klijent: <?php echo $row->ime ?> <?php echo $row->prezime ?></p>
           <p id="adresa">Adresa: <?php echo $row->adresa ?></p>
          
         </div>
           
            
            <style type="text/css">
                #rezervacijaAdmin{
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
                #ime{
                    
                    margin-left:-200%;
                    
                }
                #adresa{
                    margin-left:15%;
                }
                #naz{
                    text-align: center;
                    padding: auto;
                    color: #f04242;
                    margin-top: 7%;
                    margin-left: 15%;
                    color: rgb(121, 22, 80);
                    
                }
                #izbrisi{
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
                #izbrisi:hover{
                     background-color: rgb(158, 75, 113);
                    
                }
              
                #izmeni{
                   float: right;
                    text-decoration: none;
                    display: block;
                    padding: 5px 20px;
                    margin-left: 10px;
                    color: #fff;
                    background-color: rgb(121, 22, 80);;
                    border-radius: 5px;
                    transition: background-color 0.3s;
                }
                #izmeni:hover{
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
             	
             <p class="cena"><b>Cena: <?php echo $row->cena; ?> EUR</b></p>
             <br>
             <br>
          
           <p id="adresa">Klijent: <?php echo $row->ime ?> <?php echo $row->prezime ?></p>
           <p id="adresa">Adresa: <?php echo $row->adresa ?></p>
           
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

