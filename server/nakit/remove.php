<?php
    require '../broker.php';
    
    $broker=Broker::getBroker();
    $id=$_POST['id'];
    if(!isset($id) || !intval($id)){
       header('Location: ../../izmeni.php&id='.$id.'&greska=Los ID');
    }else{
        $broker->doi('delete from nakit where id='.$id);
        header('Location: ../../index.php');
    }
    
    


?>