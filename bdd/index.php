<?php
require_once __DIR__ . '/include/cnx.php';
 $query = 'SELECT id, nom, prenom FROM utilisateur';

 $stmt = $pdo->query($query);
 $users = $stmt->fetchAll();

?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
    <title>BDD</title>
  </head>
  <body>
    <h1 class="text-center mt-5">BDD</h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <select class="form-control" name="" id="utilisateur">
                    <option value="">Choisissez</option>
                    <?php
                        foreach($users as $user) :
                    ?>
                        <option value="<?= $user['id'] ?>"><?= $user['id'] . ' ' . $user['prenom'] . ' ' . $user['nom']; ?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div id="detail">
                
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="user.js"></script>
  </body>
</html>