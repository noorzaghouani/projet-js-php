<?php
session_start();
require_once "../includes/config.php";

// Vérifie si le client est connecté
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') {
    header("Location: ../index.php");
    exit();
}

// Récupérer l'ID du client depuis la session
$client_id = $_SESSION['client_id'];  // Assure-toi que cette valeur est bien stockée à la connexion

$message = "";

// Charger les propriétés disponibles
$proprietes = $pdo->query("SELECT id, titre FROM proprietes")->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $propriete_id = $_POST['propriete_id'];
    $montant = $_POST['montant'];

    // Insertion dans la base
    $stmt = $pdo->prepare("INSERT INTO transactions (client_id, propriete_id, date_transaction, montant) VALUES (?, ?, CURRENT_DATE, ?)");
    if ($stmt->execute([$client_id, $propriete_id, $montant])) {
        header("Location: TransationC.php");
        exit();
    } else {
        $message = "❌ Une erreur est survenue lors de l'ajout.";
    }
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/ajouterT.css">
</head>
<body>
<div class="overlay"></div>
<div class="container mt-5 form-container bg-light p-4 rounded shadow">
    <h2 class="text-center mb-4">Ajouter une Transaction</h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
        <label for="propriete_id" class="form-label">Propriété :</label>
        <select class="form-select" name="propriete_id" id="propriete_id" required>
            <?php foreach ($proprietes as $p): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['titre']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="montant" class="form-label">Montant (TND) :</label>
        <input type="number" class="form-control" step="0.01" name="montant" id="montant" required>
    </div>

   <div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="TransationC.php" class="btn btn-secondary">Annuler</a>
</div>
</form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
