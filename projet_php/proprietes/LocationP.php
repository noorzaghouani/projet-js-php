<?php
session_start();
include_once "../includes/config.php";

// Vérifie que l'utilisateur est connecté et est un client
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') {
    header("Location: ../index.php");
    exit();
}

// Récupère l'ID de la propriété
$id_propriete = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Vérifie que la propriété existe
$stmt = $pdo->prepare("SELECT * FROM proprietes WHERE id = ?");
$stmt->execute([$id_propriete]);
$propriete = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$propriete) {
    die("Propriété introuvable.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $duree = intval($_POST['duree']);
    $id_client = $_SESSION['client_id'];  // Doit être défini dans la session
    $prix_location = $propriete['prix_location'];

    // Insère la demande dans la table demandes
    $stmt = $pdo->prepare("INSERT INTO demandes (id_propriete, id_client, type, prix, message, duree_location) 
                           VALUES (?, ?, 'location', ?, ?, ?)");
    $stmt->execute([$id_propriete, $id_client, $prix_location, $message, $duree]);

    echo "<script>alert('Votre demande de location a été envoyée. Elle sera examinée par un administrateur.'); 
          window.location='listeP.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

<div class="container">
    <h2>Demande de location pour : <?= htmlspecialchars($propriete['titre']) ?></h2>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($propriete['adresse']) ?></p>
    <p><strong>Prix mensuel :</strong> <?= number_format($propriete['prix_location'], 2) ?> TND</p>

    <form method="post" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Durée souhaitée (en mois)</label>
            <input type="number" name="duree" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label class="form-label">Message (facultatif)</label>
            <textarea name="message" class="form-control" placeholder="Message à l’admin ou propriétaire"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer la demande</button>
        <a href="listeP.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>

</body>
</html>
