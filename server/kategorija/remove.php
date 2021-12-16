<?php
    require '../broker.php';
    $broker=Broker::getBroker();
    $id=$_POST['id'];


    if(!isset($id) || !intval($id)){
        echo json_encode([
            'status'=>false,
            'error'=>'Pogresan ID'
        ]);
    }else{
        echo json_encode($broker->doi('delete from kategorija where id='.$id));
    }
    
    


?>