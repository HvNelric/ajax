<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Ajax avec Jquery</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-12 mt-5">
                <form class="" id="qui">
                    <div class="form-group">
                        <label>Prénom</label>
                        <input class="form-control" type="text" name="prenom" id="prenom">
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input class="form-control" type="text" name="nom" id="nom">
                    </div>
                    <div class="form-group">
                        <label >Methode POST ou GET</label>
                        <select class="form-control" id="methode">
                            <option value="GET">GET</option>
                            <option value="POST">POST</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Envoyer</button>
                    </div>
                </form>
                <div id="reponse" style="display:none">
                    <p>Données recus en <span id="recu"></span></p>
                    <p>Bonjour <span id="nom-complet"></span></p>
                </div>
            </div>
        </div>
        <div id="reponse"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
        $(function() { // DOM ready, aq $(document).ready(function {});
            $('#qui').submit(function (event) {
                event.preventDefault();
                var method = $('#methode').val();

                if(method == 'POST') {
                    //raccourci pour $.ajax() avec method: POST
                    $.post(
                        '../hello-json.php', // fichier appelé
                        $(this).serialize(), // donnés envoyées
                        function (response) { // success
                            $('#recu').html(response.methode);
                            $('#nom-complet').text(response.nom + ' ' + response.pseudo);
                            $('#reponse').fadeIn();
                        },
                        'json' // type de données
                    );
                } else {
                    $.get(
                        '../hello-json.php', // fichier appelé
                        $(this).serialize(), // donnés envoyées
                        function (response) { // success
                            $('#recu').text(response.methode);
                            $('#nom-complet').text(response.nom + ' ' + response.pseudo);
                            $('#reponse').fadeIn();
                        },
                        'json'
                    );
                }
            });
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>