<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script>
  src="https://code.jquery.com/jquery-3.6.0.js" 
 </script>
 <link rel="stylesheet" href="style.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<?php

    if(!isset($_GET['id'])){
        header('Location: index.php');
    }
    require './server/broker.php';
    $broker=Broker::getBroker();
    $rezultat=$broker->vratiKolekciju('select * from nakit where id='.$_GET['id']);
    $nakit=$rezultat['kolekcija'][0];
   
?>


<body>
    
    <?php include 'meni.php'; ?>
    <div class='container'>
        <div class='row mt-2'>
            <div class='col-6'>
                <h1 class='text-center bg-light'>Izmeni podatke nakitu</h1>
            </div>
            <div class='col-2'>
                <form action="./server/nakit/remove.php" method="post">
                <input type="text" hidden name='id' value='<?php echo $nakit->id;?>'>    
                <button class="btn btn-danger form-control mt-2">Obrisi</button>
                </form>
            </div>
        </div>
        <div class="row mt-2" <?php echo (!isset($_GET['greska']))?'hidden':''; ?>>
            <h2 class="text-danger">
                <?php echo $_GET['greska'];?>
            </h2>
        </div>
        <input type="text" id='kategorija_id_hidden' hidden value='<?php echo $nakit->kategorija_id; ?>'>
        <div class="row mt-2">
            <div class="col-8 bg-light">
                <form action="./server/nakit/izmeni.php" method="post">
                <input type="text" hidden name='id' value='<?php echo $nakit->id;?>'>     
                <label>Naziv proizvoda</label>
                    <input type="text" required class="form-control" value='<?php echo $nakit->ime; ?>' name="ime">
                    <label>Gramaza</label>
                    <input type="number" required min="1" max="9" value='<?php echo $nakit->gramaza; ?>'
                        class="form-control" name="gramaza">
                    <label>Kategorija nakita</label>
                    <select id='vrstaaaa'  class="form-control" required
                        name='kategorija_id'>

                    </select>

                    <label>Detaljniji opis</label>
                    <textarea required name="detalji" cols="30" rows="5" class="form-control">
                    <?php echo $nakit->detalji; ?>
                    </textarea>
                    <button class="form-control btn btn-primary mt-2 mb-2">Izmeni</button>
                </form>
            </div>
        </div>
    </div>
 
    <script>
        $(document).ready(function () {
         $.getJSON('./server/kategorija/returnEverything.php', function (data) {
             
                console.log(data);
                if (!data.status) {
                    alert(data.error);
                    return;
                }

                for (let kategorija of data.kolekcija) {  
                    $('#vrstaaaa').append(`         
                        <option value='${kategorija.id}'> ${kategorija.naziv} </option>
                    `)
                } 
            })
        })
    </script>
     <?php include 'footer.php'; ?>
    
</body>

</html>