<?php
session_start();
require_once '../includes/config.php';

// Vérifie que le client est connecté
if (!isset($_SESSION['client_id']) || $_SESSION['role'] !== 'client') {
    header("Location: ../index.php");
    exit();
}

$client_id = $_SESSION['client_id'];

$sql = "SELECT t.*, p.titre AS propriete_titre
        FROM transactions t
        JOIN proprietes p ON t.propriete_id = p.id
        WHERE t.client_id = :client_id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['client_id' => $client_id]);
$transactions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Transactions</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css"> <!-- ton style sidebar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="dashboard d-flex">

    <!-- Sidebar client -->
    <?php include_once "../includes/sidebarClient.php"; ?>

    <!-- Contenu principal -->
    <main class="content p-4 w-100">
        <div class="container bg-light p-4 rounded shadow">
            <h2 class="text-center mb-4">Mes Transactions</h2>

            <!-- Bouton (optionnel selon ton système) -->
            <a href="ajouterT.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Nouvelle Transaction</a>

            <!-- Tableau des transactions -->
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Propriété</th>
                        <th>Date</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($transactions): ?>
                        <?php foreach ($transactions as $t): ?>
                            <tr>
                                <td><?= $t['id'] ?></td>
                                <td><?= htmlspecialchars($t['propriete_titre']) ?></td>
                                <td><?= $t['date_transaction'] ?></td>
                                <td><?= number_format($t['montant'], 2) ?> TND</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="4">Aucune transaction enregistrée.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
