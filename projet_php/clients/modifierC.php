<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";

// Récupération de l'ID du client
$id = $_GET['id'];

// Requête pour récupérer les infos du client
$stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
$stmt->execute([$id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    // Requête de mise à jour
    $update = $pdo->prepare("UPDATE clients SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE id = ?");
    $update->execute([$nom, $prenom, $email, $telephone, $id]);

    header("Location: listeC.php?updated=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Client</title>
    <link rel="stylesheet" href="../assets/css/modifierP.css">
</head>
<body>
    <div class="container">
        <h1>Modifier le Client</h1>
        <form method="POST">
            <label>Nom :</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($client['nom']) ?>" required>

            <label>Prénom :</label>
            <input type="text" name="prenom" value="<?= htmlspecialchars($client['prenom']) ?>" required>

            <label>Email :</label>
            <input type="email" name="email" value="<?= htmlspecialchars($client['email']) ?>" required>

            <label>Téléphone :</label>
            <input type="text" name="telephone" value="<?= htmlspecialchars($client['telephone']) ?>" required>

            <button type="submit">Enregistrer</button>
            <button><a href="listeC.php" class="btn btn-secondary btn-cancel">Annuler</a></button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
