<?php
session_start();
include_once "../includes/config.php";

// Vérifie le rôle
if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}

// Récupération des filtres
$filtre_client = $_GET['client'] ?? '';
$filtre_propriete = $_GET['propriete'] ?? '';

// Requête préparée avec filtres
$sql = "SELECT t.*, c.nom AS client_nom, c.prenom AS client_prenom, p.titre AS propriete_titre
        FROM transactions t
        JOIN clients c ON t.client_id = c.id
        JOIN proprietes p ON t.propriete_id = p.id
        WHERE (c.nom LIKE :client OR c.prenom LIKE :client)
        AND p.titre LIKE :propriete";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':client' => "%$filtre_client%",
    ':propriete' => "%$filtre_propriete%"
]);
$transactions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/styleT.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<div class="dashboard d-flex">
    
    <!-- Sidebar -->
    <?php include_once "../includes/sidebar.php"; ?>

    <!-- Contenu principal -->
    <main class="content p-4 w-100">
        <div class="container bg-light p-4 rounded shadow">
            <h2 class="text-center mb-4">Liste des Transactions</h2>

            <!-- Formulaire de recherche -->
            <form method="GET" class="row mb-4">
                <div class="col-md-5">
                    <input type="text" name="client" value="<?= htmlspecialchars($filtre_client) ?>" class="form-control" placeholder="Rechercher par client">
                </div>
                <div class="col-md-5">
                    <input type="text" name="propriete" value="<?= htmlspecialchars($filtre_propriete) ?>" class="form-control" placeholder="Rechercher par propriété">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Rechercher</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Propriété</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $t): ?>
                            <tr class="text-center">
                                <td><?= $t['id'] ?></td>
                                <td><?= htmlspecialchars($t['client_prenom'] . ' ' . $t['client_nom']) ?></td>
                                <td><?= htmlspecialchars($t['propriete_titre']) ?></td>
                                <td><?= $t['date_transaction'] ?></td>
                                <td><?= number_format($t['montant'], 2) ?> TND</td>
                                <!-- <td>
                                    <a href="modifierT.php?id=<?= $t['id'] ?>" class="text-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                    <a href="supprimerT.php?id=<?= $t['id'] ?>" class="text-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette transaction ?');"><i class="bi bi-trash3"></i></a> 
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($transactions)): ?>
                            <tr><td colspan="6" class="text-center">Aucune transaction enregistrée.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
