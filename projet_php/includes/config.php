<?php
$host = "localhost";
$dbname = "gestion_immo";
$user = "root";  // change si tu as un autre utilisateur
$pass = "";


try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

$pdo = $GLOBALS['pdo'];
?>



