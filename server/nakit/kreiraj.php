<?php
    require '../broker.php';
    $broker=Broker::getBroker();
    $ime=$_POST['nazivProizvoda'];
    $starost=$_POST['gramaža'];
    $vrsta_id=$_POST['kategorija_id'];
    $slika=$_FILES['slika'];
    $opis=$_POST['detalji'];
    $nazivSlike=$slika['name'];
    $lokacija = "../../slike/".$nazivSlike; //proveri putanje sve
    if(!move_uploaded_file($_FILES['slika']['tmp_name'],$lokacija)){
        $lokacija="";
        header("Location: ../../kreirajNakit.php?greska= Bezuspesno ubacivanje slike!");
        exit;
    }else{
        
        $lokacija=substr($lokacija,4); // pitati 
    }
    
    $rezultat=$broker->doi("insert into nakit(nazivProizvoda,gramaža,kategorija_id,slika,detalji) values ('".$nazivProizvoda."',".$gramaža.",".$kategorija_id.",'".$lokacija."','".$detalji."') ");
    if($rezultat['status']){
        header("Location: ../../kreirajNakit.php");
    }else{
        header("Location: ../../kreirajNakit.php?greska=".$rezultat['error']);
    }
    
    
    


?>