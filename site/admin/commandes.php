<?php
/*
Lister les commandes dans un tableau HTML :
- id de la commande
- nom prénom de l'utilisateur qui a passé la commande
- montant formaté
- date de la commande formatée (functions date() et strtotime() de PHP)
- statut
- date du statut formatée (functions date() et strtotime() de PHP)
Passer le statut en liste déroulante (en cours, envoyé, livré)
	avec un bouton modifier pour changer le statut de la commande
	et un champ caché pour connaître la commande dont 
	=> traiter le changement de statut en mettant à jour statut et date_statut 
		dans la table commande
*/
require_once __DIR__ . '/../include/init.php';
adminSecurity();

if (isset($_POST['modifier-statut'])) {
	$query = 'UPDATE commande SET'
		. ' statut = :statut,'
		. ' date_statut = now()'
		. ' WHERE id = :id'
	;

	$stmt = $pdo->prepare($query);
	$stmt->bindValue(':statut', $_POST['statut']);
	$stmt->bindValue(':id', $_POST['commande-id']);
	$stmt->execute();

	setFlashMessage('Le statut est modifié');
}

$query = "SELECT c.*, concat_ws(' ', u.prenom, u.nom) AS utilisateur"
	. ' FROM commande c'
	. ' JOIN utilisateur u ON c.utilisateur_id = u.id'
;

$stmt = $pdo->query($query);
$commandes = $stmt->fetchAll();

$statuts = [
	'en cours',
	'envoyé',
	'livré'
];

include __DIR__ . '/../layout/top.php';
?>
<h1>Gestion commandes</h1>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Utilisateur</th>
		<th>Montant total</th>
		<th>Date</th>
		<th>Statut</th>
		<th>Date MAJ statut</th>
	</tr>
	<?php
	foreach ($commandes as $commande) :
	?>
		<tr>
			<td><?= $commande['id']; ?></td>
			<td><?= $commande['utilisateur']; ?></td>
			<td><?= prixFr($commande['montant_total']); ?></td>
			<td><?= dateFr($commande['date_commande']); ?></td>
			<td>
				<form method="post" class="form-inline">
					<select name="statut" class="form-control">
						<?php
						foreach ($statuts as $statut) :
							$selected = ($statut == $commande['statut'])
								? 'selected'
								: ''
							;
						?>
							<option value="<?= $statut; ?>" <?= $selected; ?>>
								<?= ucfirst($statut); ?>
							</option>
						<?php
						endforeach;
						?>
					</select>
					<input type="hidden"
						   name="commande-id"
						   value="<?= $commande['id']; ?>">
					<button type="submit"
							name="modifier-statut"
							class="btn btn-primary">
						Modifier
					</button>
				</form>				
			</td>
			<td><?= dateFr($commande['date_statut']); ?></td>
			<td>
				<?php
					$query = 'SELECT id FROM detail_commande';
					$stmt = $pdo->query($query);
					$dcommande = $stmt->fetch();
				?>
				<button id="detail-commande" class="btn btn-outline-info" type="button" data-id="<?= $dcommande['id'] ?>" >Voir détails</button>
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

