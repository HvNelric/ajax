<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!empty($_POST)) {
    extract($_POST);
} elseif(!empty($_GET)) {
    extract($_GET);
} else {
    $prenom = 'John';
    $nom = 'Doe';
}

 $contenu = "Bonjour $prenom $nom";
?>

<p><?= $contenu; ?></p>

