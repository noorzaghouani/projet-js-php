<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'client') {
    header("Location: index.php");
    exit();
}

include_once "includes/config.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ancien = $_POST['ancien'];
    $nouveau = $_POST['nouveau'];
    $confirmer = $_POST['confirmer'];

    $clientId = $_SESSION['client_id'];

    // Récupérer le mot de passe actuel
    $stmt = $pdo->prepare("SELECT mot_de_passe FROM clients WHERE id = ?");
    $stmt->execute([$clientId]);
    $mot_de_passe_actuel = $stmt->fetchColumn();

    if (!password_verify($ancien, $mot_de_passe_actuel)) {
        $message = "<div class='alert alert-danger'>Ancien mot de passe incorrect.</div>";
    } elseif ($nouveau !== $confirmer) {
        $message = "<div class='alert alert-warning'>Les nouveaux mots de passe ne correspondent pas.</div>";
    } else {
        $nouveau_hash = password_hash($nouveau, PASSWORD_DEFAULT);
        $update = $pdo->prepare("UPDATE clients SET mot_de_passe = ? WHERE id = ?");
        $update->execute([$nouveau_hash, $clientId]);
        $message = "<div class='alert alert-success'>Mot de passe mis à jour avec succès.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Changer le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #c9d6ff, #e2e2e2);
            min-height: 100vh;
        }
        .container {
            max-width: 500px;
            margin-top: 80px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="mb-4 text-center">🔒 Changer le mot de passe</h3>

    <?= $message ?>

    <form method="post">
        <div class="mb-3">
            <label for="ancien" class="form-label">Ancien mot de passe</label>
            <input type="password" name="ancien" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="nouveau" class="form-label">Nouveau mot de passe</label>
            <input type="password" name="nouveau" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="confirmer" class="form-label">Confirmer le nouveau mot de passe</label>
            <input type="password" name="confirmer" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">✅ Modifier</button>
        <a href="dashboardCl.php" class="btn btn-secondary w-100 mt-2">⬅ Retour au Dashboard</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
