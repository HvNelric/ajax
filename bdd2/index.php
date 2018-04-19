<?php
    require_once __DIR__ . '/../include/cnx.php';
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Cours Ajax</title>
  </head>
  <body>
    <h1 class="text-center mt-5">modif catégorie</h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="bg-light p-5 rounded border" method="post" id="form">
                    <div class="form-group">
                       <label>Modification</label>
                       <input class="form-control" type="text" name="modif-cat" id="cat">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" name="btn-modif" type="submit" >Modifier</button>
                    </div>
                </form>
                <div class="text-white mt-2 rounded text-center" style="display:none" id="reponse">
                
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script>
        // $(function() {
        //     $('#form').submit(function (event) {
        //         event.preventDefault();
        //         var valeurCat = $('#cat').val();

        //         console.log(valeurCat);
                
        //         $.post(
        //             'categorie.php',
        //             'nom=' + valeurCat,
        //             function (response) {
        //                 $('#reponse').html('<p><span style="color:red">' + response.statut + ' : ' + '</span>' + response.message + '</p>');
        //             },
        //             'json'
        //         );
        //     });
        // });

        // correction avec serialize()
        $(function() {
            $('#form').submit(function (event) {
                event.preventDefault();
                var valeurCat = $('#cat').val();

                console.log(valeurCat);
                
                $.post(
                    'categorie.php',
                    $(this).serialize(), // envoi ttes les données du formulaire
                    function (response) {
                        var color;
                            if(response.statut == 'ok') {
                                $('#reponse').addClass('bg-primary');
                            } else {
                                $('#reponse').addClass('bg-danger');
                            }
                        $('#reponse').html('<p>' + response.statut + ' ' + response.message + '</p>');
                        $('#reponse').fadeIn();
                    },
                    'json'
                );
            });
        });
    </script>
  </body>
</html>