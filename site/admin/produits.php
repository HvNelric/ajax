<?php
// faire la page qui liste les produits dans un tableau HTML
// tous les champs sauf la description
// bonus :
// afficher le nom de la catégorie au lieu de son id
require_once __DIR__ . '/../include/init.php';
adminSecurity();


// p et c sont les alias des tables produit et categorie
// categorie_nom est l'alias du champ nom de la table categorie
// p.* veut dire tous les champs de la table produit
$query = <<<EOS
SELECT p.*, c.nom AS categorie_nom
FROM produit p
JOIN categorie c ON p.categorie_id = c.id
EOS;

$stmt = $pdo->query($query);

$produits = $stmt->fetchAll();

include __DIR__ . '/../layout/top.php';
?>
<h1>Gestion produits</h1>

<p>
	<a class="btn btn-info" href="produit-edit.php">Ajouter un produit</a>
</p>

<table class="table border rounded">
	<tr class="bg-light">
		<th>Id</th>
		<th>Nom</th>
		<th>Référence</th>
		<th>Prix</th>
		<th>Catégorie</th>
		<th width="360px"></th>
	</tr>
	<?php
	foreach ($produits as $produit) :
	?>
		<tr>
			<td><?= $produit['id']; ?></td>
			<td><?= $produit['nom']; ?></td>
			<td><?= $produit['reference']; ?></td>
			<td><?= prixFr($produit['prix']); ?></td>
			<td><?= $produit['categorie_nom']; ?></td>
			<td>
				<a class="btn btn-info"
					href="produit-edit.php?id=<?= $produit['id']; ?>">
					Modifier
				</a>
				<a class="btn btn-danger"
					href="produit-delete.php?id=<?= $produit['id']; ?>">
					Supprimer
				</a>
				<button type="button" class="btn btn-outline-info detail-produit" data-id="<?= $produit['id']; ?>">voir description</button>
			</td>
		</tr>
	<?php
	endforeach;
	?>
</table>
<div class="modal fade" id="modal-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog-centered modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-info text-white">
        
      </div>
    </div>
  </div>
</div>

<?php
$javascripts = ['admin-produits.js'];
include __DIR__ . '/../layout/bottom.php';
?>