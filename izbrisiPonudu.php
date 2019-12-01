 <?php

include "konekcija.php";

if(isset($_POST['dugme'])){
     $idponude=$_POST['idponude'];
    $sql="DELETE FROM ponuda WHERE id=$idponude";
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
    <h2><b>Izbriši ponudu</b></h2>

<form action="izbrisiPonudu.php" method="post" style="background-image: url('<?php echo $row->slika ?>'); background-size: cover; ">
<input type="text" value="<?php echo $row->id ?>" name="idponude" hidden="hidden" />
<input type="text" name="drzava" value="<?php echo $row->drzava; ?>" readonly />
<textarea name="opis" placeholder="Opis" readonly><?php echo $row->opis; ?></textarea>
<input type="text" name="cena" value="<?php echo $row->cena; ?>" readonly />

<input type="submit" name="dugme" value="Izbriši ponudu" />
</form>
</div>