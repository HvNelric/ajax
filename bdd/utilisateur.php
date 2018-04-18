<?php
    require_once __DIR__ . '/include/cnx.php';
    $query = 'SELECT * FROM utilisateur WHERE id =' . $_GET['id'];

    $stmt = $pdo->query($query);
    $user = $stmt->fetch();

?>

    <dl>
        <dt>Nom</dt>
        <dd><?= $user['nom']; ?></dd>
        <dt>Prénom</dt>
        <dd><?= $user['prenom']; ?></dd>
        <dt>Email</dt>
        <dd><?= $user['email']; ?></dd>
        <dt>Adresse</dt>
        <dd>
            <?= $user['adresse']; ?><br>
            <?= $user['ville'] . ' ' . $user['cp']; ?>
        </dd>
    </dl>