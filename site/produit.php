<?php
require_once __DIR__ . '/include/init.php';

$query = 'SELECT * FROM produit WHERE id = ' . $_GET['id'];
$stmt = $pdo->query($query);
$produit = $stmt->fetch();

$src = (!empty($produit['photo']))
	? PHOTO_WEB . $produit['photo']
	: PHOTO_DEFAULT
;

// if (!empty($_POST)) {
// 	ajoutPanier($produit, $_POST['quantite']);
// 	setFlashMessage('Le produit est ajouté au panier');
// }

include __DIR__ . '/layout/top.php';
?>
<h1><?= $produit['nom']; ?></h1>

<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<img src="<?= $src; ?>" height="200px">
			<p><?= prixFr($produit['prix']); ?></p>
			<form id="form-ajout" method="post" class="form-inline">
				<input type="hidden" name="id-hidden" value="<?= $produit['id']; ?>">
				<label>Qté</label>
				<select name="quantite" class="form-control">
					<?php
					for ($i = 1; $i <= 10; $i++) :
					?>
						<option value="<?= $i; ?>"><?= $i; ?></option>
					<?php
					endfor;
					?>
				</select>
				<button type="submit" class="btn btn-primary byn-ajout">Ajouter au panier</button>
			</form>
		</div>
		<div class="col-12">
			<p><?= $produit['description']; ?></p>
		</div>
		<div class="col-12">


			<div class="modal fade" id="modal-produit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
					</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>
<?php
$javascripts = ['admin-ajout.js'];
include __DIR__ . '/layout/bottom.php';
?>