<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";

$id = $_GET['id'];
$transaction = $pdo->prepare("SELECT * FROM transactions WHERE id = ?");
$transaction->execute([$id]);
$transaction = $transaction->fetch();

$clients = $pdo->query("SELECT * FROM clients")->fetchAll();
$proprietes = $pdo->query("SELECT * FROM proprietes")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $client_id = $_POST['client_id'];
    $propriete_id = $_POST['propriete_id'];
    $date = $_POST['date_transaction'];
    $montant = $_POST['montant'];

    $stmt = $pdo->prepare("UPDATE transactions SET client_id=?, propriete_id=?, date_transaction=?, montant=? WHERE id=?");
    $stmt->execute([$client_id, $propriete_id, $date, $montant, $id]);

    header("Location: listeT.php?updated=1");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Transaction</title>
    <link rel="stylesheet" href="../assets/css/modifierP.css">
</head>
<body>
<div class="container">
    <h1>Modifier la Transaction</h1>
    <form method="POST">
        <label>Client :</label>
        <select name="client_id" required>
            <?php foreach ($clients as $c): ?>
                <option value="<?= $c['id'] ?>" <?= $c['id'] == $transaction['client_id'] ? "selected" : "" ?>>
                    <?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Propriété :</label>
        <select name="propriete_id" required>
            <?php foreach ($proprietes as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $transaction['propriete_id'] ? "selected" : "" ?>>
                    <?= htmlspecialchars($p['titre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Date :</label>
        <input type="date" name="date_transaction" value="<?= $transaction['date_transaction'] ?>" required>

        <label>Montant :</label>
        <input type="number" name="montant" value="<?= $transaction['montant'] ?>" step="0.01" required>

        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>
