<!-- fajl koji konunicira sa brokerom, a broker komunicira sa bazom -->
<?php

require '../broker.php'; //napravi vezu sa brokerom kad ga napravis
$broker=Broker::getBroker();

echo json_encode($broker->vratiKolekciju('select * from kategorija'));

?>

