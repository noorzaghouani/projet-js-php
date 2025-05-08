<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";
//include_once "../assets/js/scriptP.js";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer la propriété
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $stmt->execute([$id]);

    // Redirection vers la liste avec un message
    header("Location: listeC.php?deleted=1");
    exit();
} else {
    header("Location: listeC.php");
    exit();
}
?>

