<?php
    require '../broker.php';
    $broker=Broker::getBroker();
   
    $naziv=$_POST['naziv'];
    if(!preg_match('/^[a-zA-Z]*$/',$naziv)){
        header("Location: ../../kategorije.php?greska=Neispravan naziv");
    }else{
        $rezultat=$broker->doi("insert into kategorija(naziv) values ('".$naziv."') ");
        if($rezultat['status']){
            header("Location: ../../kategorije.php");
        }else{
            header("Location: ../../kategorije.php?greska=".$rezultat['error']);
        }
    }
       


?>