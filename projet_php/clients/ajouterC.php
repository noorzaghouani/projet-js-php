<?php
include_once "../includes/config.php";
//include_once "../includes/auth.php";

$message = "";

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    $stmt = $pdo->prepare("INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nom, $prenom, $email, $telephone])) {
        header("Location: listeC.php?success=1");
        exit();
    } else {
        $message = "Erreur lors de l'ajout du client.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Client</title>
    <link rel="stylesheet" href="../assets/css/styleAP.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter un Client</h1>

        <?php if ($message): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST" class="form-ajout">
            <div class="mb-3">
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>
            <div class="mb-3">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
            </div>

            <div class="form-actions d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="listeC.php" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scriptC.js"></script>
</body>
</html>
