<?php
session_start();
include_once "../includes/config.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') {
    header("Location: ../index.php");
    exit();
}

$id_propriete = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $pdo->prepare("SELECT * FROM proprietes WHERE id = ?");
$stmt->execute([$id_propriete]);
$propriete = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$propriete) {
    die("Propriété introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $id_client = $_SESSION['client_id']; // Assurez-vous que l'ID client est bien stocké dans la session
    $prix_achat = $propriete['prix_achat'];

    $stmt = $pdo->prepare("INSERT INTO demandes (id_propriete, id_client, type, prix, message) VALUES (?, ?, 'achat', ?, ?)");
    $stmt->execute([$id_propriete, $id_client, $prix_achat, $message]);

    echo "<script>alert('Votre demande d\'achat a été envoyée. Elle sera examinée par un administrateur.');window.location='listeP.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande d'achat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

<div class="container">
    <h2>Demande d'achat pour : <?= htmlspecialchars($propriete['titre']) ?></h2>
    <p><strong>Adresse :</strong> <?= htmlspecialchars($propriete['adresse']) ?></p>
    <p><strong>Prix d'achat :</strong> <?= number_format($propriete['prix_achat'], 2) ?> TND</p>

    <form method="post" class="mt-4">
        <div class="mb-3">
            <label class="form-label">Message au propriétaire ou à l’admin</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Envoyer la demande</button>
        <a href="listeP.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>

</body>
</html>
