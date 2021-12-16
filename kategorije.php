<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
  src="https://code.jquery.com/jquery-3.6.0.js" </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
</head>


<body>
<style>
        body {
            background-image: url('../nakit/slike/pozadina4.jpg') !important; 
            background-size: cover;
        }
    </style>
    <?php include 'meni.php '; ?>
    <div class='container'>
        <div class='row mt-2'>
            <div class='col-7'>
                <table class='table table-light display'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv kategorije</th>
                        </tr>
                    </thead>
                    <tbody id='podaci'>

                    </tbody>
                </table>
            </div>
            <div class='col-5'>
                <h2>Kreiraj kategoriju</h2>
                <form class='mb-5' action="./server/kategorija/kreiraj.php" method="post">
                    <label>Naziv kategorije</label>
                    <input type="text" name='naziv' class='form-control'>
                    <label class='text-danger bg-light' <?php echo (!isset($_GET['greska']))?'hidden':''; ?> ><?php echo $_GET['greska']; ?></label>
                    <button type='submit' class='form-control btn btn-primary mt-2'>Kreiraj kategoriju</button>
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
                $('#podaci').html('');
                for (let kategorija of data.kolekcija) {
                    $('#podaci').append(`
                        <tr>
                            <td>${kategorija.id}</td>
                            <td>${kategorija.naziv}</td>
                            <td>
                                <button class='form-control btn btn-danger' onClick=obrisi(${kategorija.id}) >Obrisi</button>
                            </td>
                        </tr>
                    `)
                }
            })
        })
        function obrisi(id_kategorije) {
            $.post('./server/kategorija/remove.php', { id: id_kategorije }, function (data) {
                if (data.status=='false') {
                    alert(data.error)
                } else {
                    window.location.reload();
                }
            })
        }
    </script>
   
    
</body>

</html>