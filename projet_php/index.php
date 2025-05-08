<?php
require_once 'includes/config.php';
session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Connexion en tant qu'admin
    $valid_user = "admin";
    $valid_pass = "admin123";

    if ($email_or_username === $valid_user && $password === $valid_pass) {
        $_SESSION['username'] = $valid_user;
        $_SESSION['role'] = 'admin';
        header("Location: dashboard.php");
        exit();
    } else {
        // Connexion en tant que client (via table clients)
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email");
        $stmt->execute(['email' => $email_or_username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Si tu n'utilises pas password_hash(), retire la vérification sécurisée
            if (password_verify($password, $user['password']) || $password === $user['password']) {
                $_SESSION['username'] = $user['prenom']; // ou $user['email']
                $_SESSION['role'] = 'client';
                $_SESSION['client_id'] = $user['id']; 
                header("Location: dashboradCl.php");
                exit();
            } else {
                $message = "❌ Mot de passe incorrect.";
            }
        } else {
            $message = "❌ Compte inexistant.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body class="bg-image">

<?php if (isset($_GET['logout'])): ?>
    <div class="alert alert-warning text-center">
        🔒 Vous avez été déconnecté avec succès.
    </div>
<?php endif; ?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-container bg-white bg-opacity-75 p-4 rounded shadow text-center">
        <h2 class="mb-4">Connexion</h2>
        <?php if (!empty($message)) : ?>
            <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="input-group mb-3">
                <span class="input-group-text">👤</span>
                <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">🔒</span>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">👁</button>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
            <div class="mt-3">
                <a href="auth.php" class="text-decoration-none">➕ Créer un compte</a><br>
                <!-- <a href="#" class="text-decoration-none">🔗 Mot de passe oublié ?</a> -->
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
