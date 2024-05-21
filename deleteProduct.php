<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id = :id";
$stmt = $pdo->prepare($sql);

if ($stmt->execute(['id' => $id])) {
    echo json_encode(['success' => true]);
    //Redirection vers la page d'acceuil après la suppression(Le produit ne figurera plus sur la liste actualisée)
    header("Location: index.php"); 
} else {
    echo"erreur";
    echo json_encode(['success' => false]);
}
?>