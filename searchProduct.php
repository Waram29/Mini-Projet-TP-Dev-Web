<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="header_logo">
            <img id="log" src="./img/logo.jpeg" class="logo" alt="logo">
            <span>KOKO STYLE</span>
        </div>
        <div id="date-heure"></div>
    </header>
<?php
include 'db.php';

try {
    // Récupérer le terme de recherche avec la methode GET
    $query = isset($_GET['keyword']) ? $_GET['keyword'] : '';

    if (!empty($query)) {
        // Préparer la requête SQL pour rechercher les produits correspondants
        $sql = 'SELECT id, name, description, price FROM products WHERE name LIKE :query OR description LIKE :query';
        $stmt = $pdo->prepare($sql);

        // Exécuter la requête avec le terme de recherche
        $stmt->execute([
            ':query' => '%' . $query . '%'
        ]);
        // Récupérer les résultats
        $results = $stmt->fetchAll();
        // Afficher les résultats
        if (count($results) > 0) {
        ?>
        <section class="listeproduit">
            <h2 class="searchTITLE">Resultats de la recherche</h2>
        <?php
            foreach($results as $row){
        ?>
        <div class="searchresult">
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
                        <button type="submit" name="id" value="<?=$row["id"]?>"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    <form action="editProduct.php" method="post">
                    <?//Mettre l'id du produit  comme valeur du bouton d'edition pour permettre la recuperution avec la methode post du formulaire?>
                        <button type="submit" name="id" value="<?=$row["id"]?>"><i class="fas fa-edit"></i></button> 
                    </form>
                </div>
            </div>
        </div>
        <?php
        }// Lien sous forme de bouton permettant de retourner vers la page d'acceuil.
        ?>
        <div id="Return_home" class="searchresult">
            <a href="index.php" class="return-button"><i class="fas fa-arrow-left"></i></a>
        </div>
        </section>
        <?php
        } else {
            echo "<script>alert('Aucun produit trouvé.'); window.history.back();</script>";
            header("Location: index.php");
        }
    } else {
        echo "<script>alert('Veuillez entrer un terme de recherche.'); window.history.back();</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Erreur : " . htmlspecialchars($e->getMessage()) . "'); window.history.back();</script>";
}
?>
</body>
</html>
