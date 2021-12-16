<?php
    require '../broker.php';
    $broker=Broker::getBroker();
    $ime=$_POST['ime'];
    $gramaza=$_POST['gramaza'];
    $kategorija_id=$_POST['kategorija_id'];
    $detalji=$_POST['detalji'];
    $id=$_POST['id'];
   
    
    $upit="update nakit set ime='$ime', gramaza=".$gramaza.", kategorija_id=".$kategorija_id.", detalji='".$detalji."' where id=".$id;
    
    if(!isset($id)){
        header('Location: ../../izmeni.php&id='.$id.'&greska=Nije prosledjen id');
        exit;
    }
   
    $broker->doi( $upit);
    header('Location: ../../index.php');


?>