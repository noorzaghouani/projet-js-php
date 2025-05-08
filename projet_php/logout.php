

<?php


session_start();
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session

// Redirection vers la page de connexion avec message
header("Location: index.php?logout=1");
exit();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="assets/js/logout.js"></script>
</body>
</html>