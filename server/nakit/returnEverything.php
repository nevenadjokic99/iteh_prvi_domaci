<?php
    require '../broker.php';
    $broker=Broker::getBroker();
  
    
    echo json_encode($broker->vratiKolekciju("select k.*, v.naziv as 'kategorija_naziv' from nakit k inner join kategorija v on(k.kategorija_id=v.id)"));

?>