<!DOCTYPE html>
<html>
    <head>
        <title>Ajax</title>
    </head>
    <body>
        <button type="button" id="action">appeller le fichier hello.php</button>
        <div id="reponse"></div>
        <script>
            document.getElementById('action').addEventListener('click', function() {
                // instanciation de l'objet
                var xhttp = new XMLHttpRequest();
                // on définit ce qui va être fait apres l'appel ajax
                xhttp.onreadystatechange = function() {
                    // xhttp.readyState === 4 : on a recu la réponse du serveur
                    // xhttp.status == 200 : le serveur a répondu
                    // par le code HTTP 200 ok
                    if (xhttp.readyState === 4 && xhttp.status === 200) {
                        // dans xhttp.responseText on a le contenu
                        // du fichier que l'on appelle
                        document.getElementById("reponse").innerHTML = xhttp.responseText;
                    }
                };
                // appel en HTTP GET du fichier hello.php
                // à la racine du dossier ajax
                xhttp.open('GET', '../hello.php');
                // envoi de l'appel
                xhttp.send();
            });

            // $('#action').click(function() {
            //     var xhttp = new XMLHttpRequest();
            //     xhttp.onreadystatechange = function() {
            //         if(xhttp.readyState === 4 && xhttp.status === 200) {
            //             $('#reponse').html(xhttp.responseText);
            //         }
            //     }
            //     xhttp.open('GET', '../hello.php');
            //     xhttp.send();
            // });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
