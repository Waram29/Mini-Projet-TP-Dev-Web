<head>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="produits-container">
    <?php
        include 'db.php';
        $stmt = $pdo->query('SELECT id, name, description, price FROM products');
        $result  = $stmt->fetchAll(); //stocker les resultats complets(Tous les lignes trouvées)  de la requete dans la variables $resulst 

        // Parcours des résultats et affichage de chaque produit
        foreach($result as $row){ // La boucle parcourt chaque ligne de résultats et stocke les données de chaque produit dans la variable $row.
            //Afficher chaque produit
            ?>
            <div class="produit-boite">
                <div>
                    <p>
                        <?=$row["name"]?> 
                    </p>
                    <?=$row["description"]?><br>
                    Prix: <?=$row["price"]?>DHS
                </div>
                <div class="Edit-Del_Button">
                    <form action="deleteProduct.php" method="post">
                    <?//Mettre l'id du produit  comme valeur du bouton pour permettre la recuperution avec la methode post du formulaire?>
                        <button type="submit" name="id" value="<?=$row["id"]?>"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <form action="editProduct.php" method="post">
                    <?//Mettre l'id du produit  comme valeur du bouton pour permettre la recuperution avec la methode post du formulaire?>
                        <button type="submit" name="id" value="<?=$row["id"]?>"><i class="fas fa-edit"></i></button>
                    </form>
                </div>
            </div>
            <?php
        }
    ?>

</div>