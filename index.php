<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
</head>

<body>
<style>
        body {
            background-image: url('../nakit/slike/pozadina2.jpg') !important; 
            background-size: cover;
        }
    </style>

<?php include 'meni.php'; ?>

<div class='container'>
        <div class="row mt-2">
            <div class="col-3">
                <select id='sort' class="form-control">
                    <option value="">Sortiraj po nazivu</option>
                    <option value="ASC">Abecedno</option>
                    <option value="DESC">Unazad</option>
                </select>
            </div>
            <div class="col-6">
                <input type="text" id='nazivF' class="form-control" placeholder="Filtriraj po nazivu">
            </div>
            <div class="col-3">
                <select id='kategorija' class="form-control">
                    <option value="0">Filtriraj po kategoriji</option>

                </select>
            </div>
        </div>
        <div id='podaci'>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    ></script>


    <script>
        let nakiti = [];
        $(document).ready(function () {
            $.getJSON('./server/nakit/returnEverything.php', function (data) {
               
                if (data.status == 'false') {
                    alert(data.error);
                    return;
                } else {
                    nakiti = data.kolekcija;
                    formiraj();
                }

            });
            $.getJSON('./server/kategorija/returnEverything.php', function (data) {

                if (!data.status) {
                    alert(data.error);
                    return;
                }

                for (let kategorija of data.kolekcija) {
                    $('#kategorija').append(`
                        <option value='${kategorija.id}'> ${kategorija.naziv} </option>
                    `)
                }
            })

            $('#kategorija').change(function () {
                formiraj();
            })
            $('#sort').change(function () {
                formiraj();
            })
            $('#nazivF').change(function () {
                formiraj();
            })

        })
        function formiraj() {
            const kategorija = $('#kategorija').val();
            const sort = $('#sort').val();
            const nazivF = $('#nazivF').val();

            const niz = nakiti.filter(element => {
                return (kategorija == 0 || element.kategorija_id == kategorija) && element.ime.startsWith(nazivF) 

                
            })
            niz.sort((a, b) => {
                if (sort == 'ASC')
                    return (a.ime.toLowerCase() > b.ime.toLowerCase()) ? 1 : -1;
                return (a.ime.toLowerCase() > b.ime.toLowerCase()) ? -1 : 1;
            });

            let red = 0;
            let kolona = 0;
            $('#podaci').html(`<div id='row-${red}' class='row mt-2'></div>`)
            for (let nakit of niz) {
                if (kolona === 3) {
                    kolona = 0;
                    red++;
                    $('#podaci').append(`<div id='row-${red}' class='row mt-2'></div>`)
                }
                $(`#row-${red}`).append(
                    `
                        <div class='col-4 pt-2 bg-light'>
                            <img src='${nakit.slika}' width='100%' height='320' />
                            <h4 class='text-center'>${nakit.ime}</h4>
                            <h5 class='text-center'>${nakit.kategorija_naziv}</h5>  
                            
                           <a href='./izmena.php?id=${nakit.id}'> <button class='form-control btn btn-success mb-2'>Vidi</button></a>
                        </div>
                    `
                ) 
            }
        }

    </script>
    

 
</body>
<?php include 'footer.php'; ?>

</html>