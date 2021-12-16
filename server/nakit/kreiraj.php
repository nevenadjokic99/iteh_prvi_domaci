<?php
require '../broker.php';
$broker=Broker::getBroker();


$ime=$_POST['ime'];
$gramaza=$_POST['gramaza'];
$kategorija_id=$_POST['kategorija_id'];
$slika=$_FILES['slika'];
$detalji=$_POST['detalji'];
$nazivSlike=$slika['name'];
$lokacija = "../../slike/".$nazivSlike;
$id=$_POST['id'];


if(!move_uploaded_file($_FILES['slika']['tmp_name'],$lokacija)){
    $lokacija="";
    header("Location: ../../kreirajNakit.php?greska=Prebacivanje slike nije uspelo!");
    exit;
}else{
    
    $lokacija=substr($lokacija,4);
}

$rezultat=$broker->doi("insert into nakit(ime,gramaza,kategorija_id,slika,detalji) values ('".$ime."','".$gramaza."','".$kategorija_id."','".$lokacija."','".$detalji."') ");

if($rezultat['status']){
    header("Location: ../../kreirajNakit.php");
}else{
    header("Location: ../../kreirajNakit.php?greska=".$rezultat['error']);
}




?>