<?php
    require_once __DIR__ . '/../include/cnx.php';


    
        if(!empty($_POST['modif-cat'])) {
            $queryAjout = <<<EOS
    INSERT INTO categorie (
        nom
    ) VALUES (
        :nom
    )
EOS;
        $stmt = $pdo->prepare($queryAjout);
        $stmt->bindValue(':nom', $_POST['modif-cat']);
        $stmt->execute();
        
        $data = [
            'statut' => 'ok',
            'message' => 'la catégorie est crée' 
        ];
        
        } else {
            $data = [
                'statut' => 'ko',
                'message' => 'la catégorie est vide' 
            ];
        }

        echo json_encode($data);

?>
