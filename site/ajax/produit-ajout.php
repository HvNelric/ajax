<?php

    require_once __DIR__ . '/../include/init.php';

    $query = 'SELECT * FROM produit WHERE id = ' . $_POST['id-hidden'];
    $stmt = $pdo->query($query);
    $produit = $stmt->fetch();

    // if(!empty()) {
    //     ajoutPanier($produit, $_POST['quantite']);
 
       // }
?>
    <?php
        if(!empty($_POST)) :

            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }
        
            // si le produit n'est pas encore dans le panier
            // on l'y ajoute
            if (!isset($_SESSION['panier'][$produit['id']])) {
                $_SESSION['panier'][$produit['id']] = [
                    'nom' => $produit['nom'],
                    'prix' => $produit['prix'],
                    'quantite' => $_POST['quantite']
                ];
            } else {
                // si le produit est déjà dans le panier, on met à jour la quantité
                $_SESSION['panier'][$produit['id']]['quantite'] += $_POST['quantite'];
            }
        ?>
            <h5>Produit Ajouté</h5>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                    <td><?= $produit['nom'] ?></td>
                    <td><?= $produit['description'] ?></td>
                    <td><?= $produit['prix'] ?></td>

                    </tr>
                </tbody>
            </table>

    <?php
        endif;
    ?>