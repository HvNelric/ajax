<?php
    require_once __DIR__ . '/../include/init.php';

    $query = 'SELECT description FROM produit WHERE id =' . $_GET['id'];
    $stmt = $pdo->query($query);
    echo $stmt->fetchColumn();


?>