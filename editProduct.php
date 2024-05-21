<?php
// Démarrage de la session
session_start();
include 'db.php';

$id = $_POST['id'];

// Requête SQL pour sélectionner les détails du produit en fonction de son ID
$stmt = $pdo->query("SELECT id,name,description,price FROM products WHERE id = '$id'");
$product = $stmt->fetchObject(); // Récupération du produit sous forme d'objet

$_SESSION["editprod"] = $product; // Stocker du produit dans une variable de session nommée "editprod" pour etre utilisé dans la page principale (index.php)
header("Location: index.php");


?>
