<?php
include 'db.php';

// Récupération des données du formulaire POS
$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

try {
    $pdo->beginTransaction();
    // Requête SQL pour mettre à jour les informations du produit
    $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':id' => $id
    ])) {
        $pdo->commit(); // Validation de la transaction si la mise à jour réussit
        echo json_encode(['success' => true]); // Envoyer d'une réponse JSON indiquant la reussite de l'exection
        header("Location: index.php");// Redirection vers la page d'accueil
        exit(); // Arrêt de l'exécution du script lorsque la requete a réussi
    } else {
        // Annuler de la transaction en cas d'échec de la mise à jour
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => "Erreur lors de l'édition"]);
    }
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
