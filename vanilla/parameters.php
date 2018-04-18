<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>parameters</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <form class="" id="qui">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" id="nom">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" id="prenom">
                </div>
                <div class="form-group">
                    <label >Methode POST ou GET</label>
                    <select id="methode">
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
            <div id="reponse"></div>
        </div>
    </div>
    <script>
        document.getElementById('qui').addEventListener('submit', function(e) {
            e.preventDefault();
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var queryString = 'nom=' + nom + '&prenom=' + prenom;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {

                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    document.getElementById("reponse").innerHTML = xhttp.responseText;
                        document.getElementById('reponse').innerHTML = xhttp.responseText;
                }
            }
            if(document.getElementById('methode').value == 'POST') {
                // en POST
                xhttp.open('POST', '../hello.php');
                // on ajoute une entete HTTP pour signifier qu'il y a des donnés en POST
                xhttp.setRequestHeader(
                    'Content-type',
                    'application/x-www-form-urlencoded'
                );
                // on passe la query string au moment de l'envoi
                xhttp.send(queryString);
            } else {
                // en GET
                xhttp.open('GET', '../hello.php?' + queryString);
                xhttp.send();
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>