<?php
include_once "../includes/config.php";
//include_once "../includes/auth.php";
//include_once "../assets/js/scriptP.js";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Supprimer la propriété
    $stmt = $pdo->prepare("DELETE FROM proprietes WHERE id = ?");
    $stmt->execute([$id]);

    // Redirection vers la liste avec un message
    header("Location: listeP.php?deleted=1");
    exit();
} else {
    header("Location: listeP.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprission</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="scriptP.js"></script>
</body>
</html>
