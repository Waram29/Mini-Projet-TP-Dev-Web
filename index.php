<?php
session_start();
$editpro = false;
if (isset($_SESSION['editprod'])) {
    $editpro = true;
    $editdata = $_SESSION['editprod'];
    unset($_SESSION['editprod']);
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des Produits</title>
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
        <nav>
            <ul class="nav_menu">
                <li>
                    <a href="index.php" >Acceuil</a>
                </li> 
                <li>
                    <form action="searchProduct.php" method="get">
                        <input type="search" id="keyword" name="keyword" placeholder="Rechercher un produit..." aria-label="Rechercher">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </li>          
            </ul>
        </nav>
        <main>
            <section class="listeproduit">
                <h2>Liste des produits</h2>
                <?php 
                    //Affichage de produits  à chaque ajout.
                    include 'getProduct.php'; 
                ?>
            </section>
            <?php
            /*Si l'utilisatuer clique sur le boutton editer, 
            on affiche le formulaire de modification de produit 
            avec les informations à modifier.*/ 
                if ($editpro) { 
                    ?>
                    <section class="formulaire">
                        <h2>Editer un produit</h2>
                        <form id="productForm" action="edit_addProduct.php" method="post">
                            <div class="form-group">
                                <label for="name">Nom du produit :</label>
                                <input type="text" id="name" name="name" value="<?=$editdata->name?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea id="description" name="description"  required><?=$editdata->description?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Prix :</label>
                                <input type="number" id="price" name="price" value="<?=$editdata->price?>" required>
                            </div>
                            <div class="form-group">
                            <?//Mettre l'id du produit  comme valeur du bouton d'edition pour permettre la recuperution avec la methode post du formulaire?>
                                <button type="submit" name="id" value="<?=$editdata->id?>">Editer</button>
                            </div>
                        </form>
                    </section>
                    <?php
                /*Sinon on affiche le formulaire normal(Formulaire d'ajout de produit).*/
                } else { 
                    ?>
                    <section class="formulaire">
                        <h2>Ajouter un produit</h2>
                        <form id="productForm" action="addProduct.php" method="post">
                            <div class="form-group">
                                <label for="name">Nom du produit :</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Prix :</label>
                                <input type="number" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Ajouter">
                            </div>
                        </form>
                    </section>
                    <?php
                }
            ?>
        </main>
        <footer id="footer">
        <div class="footer-content">
            <div class="icons">
                <a href="https://www.facebook.com" target="_blank" class="facebook" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" target="_blank" class="twitter" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank" class="instagram" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="mailto:contact@kokostyle.com" class="email" aria-label="Email"><i class="fas fa-envelope"></i></a>
            </div>
            <div class="footer-text">
                <span>&copy; 2024 KOKO STYLE Gestion des produits</span>
            </div>
            <p> </p>
        </div>
    </body>
</html>