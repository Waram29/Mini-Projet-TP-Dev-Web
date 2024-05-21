<?php
include 'db.php';

// Récupération des données du formulaire en methode POST
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
$stmt = $pdo->prepare($sql);

// Exécution de la requête avec les valeurs récupérées du formulaire
if ($stmt->execute([
    ':name' => $name, 
    ':description' => $description, 
    ':price' => $price])) {
    // Si l'insertion réussit, envoie une réponse JSON indiquant le succès
    echo json_encode(['success' => true]);
    // Retour vers la page d'accueil (index.php)
    header("Location: index.php");
} else {
    echo"erreur";
    echo json_encode(['success' => false]);
}


?>
