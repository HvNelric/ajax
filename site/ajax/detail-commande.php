<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<?php
    require_once __DIR__ . '/../include/init.php';

    $query = 
            // 'SELECT p.nom, p.prix, d.quantite
            // FROM commande c, detail_commande d, produit p
            // WHERE c.id = d.commande_id  
            // AND d.produit_id = p.id
            // AND c.id = ' . $_GET['id'];
            'SELECT p.nom, p.prix, d.quantite
            FROM commande c, detail_commande d, produit p
            WHERE d.produit_id = p.id
            AND c.id =' . $_GET['id'];

    
    $stmt = $pdo->query($query);
    $commandes = $stmt->fetchAll();
    // echo '<pre>';
    // var_dump($commande);
    // echo '</pre>';

?>

<div class="container">
  <div class="row">
    <div class="col-12 col_md-4">
      <table class="table border rouded">
        <thead>
          <tr>
              <h5 class="bg-dark p-1">Produit</h5>
          </tr>

          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Quantité</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($commandes as $commande) :
          ?>
          <tr>
            <td><?= $commande['nom']; ?></td>
            <td><?= $commande['prix']; ?></td>
            <td><?= $commande['quantite']; ?></td>
          </tr>
          <?php
            endforeach;
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>