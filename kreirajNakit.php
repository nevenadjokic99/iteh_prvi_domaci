<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Kreiraj</title>
</head>

<body>
    <?php include 'meni.php '; ?>
    <div class='container'>
        <div class='row mt-2 '>
            <h1>Kreiraj svoj nakit</h1>

        </div>
        <div class='row mt-2 bla' <?php echo (!isset($_GET['greska']))?'hidden':''; ?>> <!-- Nadji u klipu -->
            <h2 class='text-danger bg-light'>
                <?php echo $_GET['greska']; ?>
            </h2>
        </div>
        <div class="row mt-2 pretragaNakita">
            <div class="col-8 bg-light ram">
                <form action="" method="post" enctype="multipart/form-data" size='300'>
                     <!-- dodati-->
                    
                    <label>Naziv prozvoda</label>
                    <input type="text" required class="form-control" name="nazivProizvoda">

                    <label>Gramaža</label>
                    <input type="number" required min="1" max="9" class="form-control" name="gramaža">
                    <label>Kategorija nakita</label> <!--Prsten, orlica, mindjuse....-->
                    <select id='vrstaaaa' class="form-control" required name='kategorija'>

                    </select>
                    <label>Slika</label>
                    <input type="file" required class="form-control" name="detalji">
                    <label>Detaljniji opis</label>
                    <textarea required name="detalji" cols="30" rows="5" class="form-control">

                    </textarea>
                   
                    <button class="form-control btn btn-primary mt-2 mb-2 dugmePretraga">Napravi</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>