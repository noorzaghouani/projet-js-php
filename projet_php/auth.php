<?php
//require_once __DIR__ . '/../config.php'; // Connexion via PDO
require_once 'includes/config.php';
//$pdo = $GLOBALS['pdo'];

session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);
    $password = trim($_POST['password']);

    // Vérifier si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM clients WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $message = "❌ L'email existe déjà. Veuillez en utiliser un autre.";
    } else {
        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion du nouveau client
        $stmt = $pdo->prepare("INSERT INTO clients (nom, prenom, email, telephone, password) VALUES (?, ?, ?, ?, ?)");
        $result = $stmt->execute([$nom, $prenom, $email, $telephone, $hashed_password]);

        if ($result) {
            $_SESSION['username'] = $email;
            $_SESSION['role'] = 'client';
            header("Location: dashboard.php");
            exit();
        } else {
            $message = "❌ Une erreur est survenue lors de l'inscription.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="bg-image">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-container bg-white bg-opacity-75 p-4 rounded shadow text-center">
        <h2 class="mb-4">Créer un compte</h2>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-group mb-3">
                <span class="input-group-text">📝</span>
                <input type="text" class="form-control" name="nom" placeholder="Nom" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">🧑</span>
                <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">📧</span>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">📞</span>
                <input type="text" class="form-control" name="telephone" placeholder="Téléphone" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">🔒</span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">👁</button>
            </div>
            <button type="submit" class="btn btn-success w-100">S'inscrire</button>
            <div class="mt-3">
                <a href="/index.php" class="text-decoration-none">🔙 Déjà inscrit ? Connexion</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Afficher/Masquer mot de passe
    document.getElementById("togglePassword").addEventListener("click", function () {
        const pwd = document.getElementById("password");
        pwd.type = pwd.type === "password" ? "text" : "password";
    });
</script>
</body>
</html>
