 <?php

include "konekcija.php";
if(isset($_POST['dugme'])){
    $idponude=$_POST['idponude'];
    $drzava=$_POST['drzava'];
    $opis=$_POST['opis'];
    $cena=$_POST['cena'];
    
    
     $sql="UPDATE ponuda SET drzava='".$drzava."',opis='".$opis."',cena='".$cena."' WHERE id='".$idponude."'";
        $mysqli->query($sql);

   header('Location: ponuda.php'); 
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
    <h2><b>Izmeni ponudu</b></h2>
   
<form action="izmeniPonudu.php" method="post" style="background-image: url('<?php echo $row->slika ?>'); background-size: cover; ">
<input type="text" value="<?php echo $row->id ?>" name="idponude" hidden="hidden" />
<input type="text" name="drzava" value="<?php echo $row->drzava; ?>" />
<textarea name="opis" placeholder="Opis"><?php echo $row->opis; ?></textarea>
<input type="text" name="cena" value="<?php echo $row->cena; ?>" />
<input type="submit" name="dugme" value="Izmeni ponudu" />
</form>
</div>