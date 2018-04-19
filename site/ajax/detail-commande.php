<?php
    require_once __DIR__ . '/../include/init.php';

    $query = //'SELECT p.*, d.* FROM detail_commande d, produit p WHERE d.id = p.produit_id AND d.produit_id =' . $_GET['id'];
            'SELECT p.*, d.*, c.* FROM produit p, detail_commande d, commande c WHERE p.id = d.produit_id AND d.produit_id = c.id AND c.id =' . $_GET['id'];
    $stmt = $pdo->query($query);
    $commande = $stmt->fetchAll();
    echo '<pre>';
    var_dump($commande);
    echo '</pre>';

?>

<table class="table">
  <thead>
    <tr>
        <td>Commande</td>
    </tr>
    <tr>
      <th scope="col">Montant total</th>
      <th scope="col">Date de commande</th>
      <th scope="col">Statut</th>
      <th scope="col">Date Statut</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $commande['montant_total']; ?></td>
      <td><?= $commande['date_commande']; ?></td>
      <td><?= $commande['statut']; ?></td>
      <td><?= $commande['date_statut']; ?></td>
    </tr>
    <tr><td>Detail Commande</td></tr>
    <tr>
      <th scope="col">Prix</th>
      <th scope="col">Quantité</th>
    </tr>
    <td><?= $commande['prix']; ?></td>
    <td><?= $commande['quantite']; ?></td>
    <tr></tr>
  </tbody>
</table>