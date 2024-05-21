<?php

$host= 'localhost';
$user='root';
$keypass= '';
$dbname= 'store';
try {

    $pdo= new PDO ("mysql:host=$host; dbname=$dbname;charset=utf8", $user,$keypass );
    $pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (Exception $e) {
    echo 'Erreur de connexion:'. $e->getMessage () .'<br>';
    die;
}
?>