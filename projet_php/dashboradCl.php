<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'client') {
    header("Location: index.php");
    exit();
}
include_once "includes/config.php";

$clientId = $_SESSION['client_id']; 
// Identifiant du client connecté
//$nom = ($_SESSION['nom']);
// Nombre total de ses transactions
$nbTransactionsClient = $pdo->query("SELECT COUNT(*) FROM transactions WHERE client_id = $clientId")->fetchColumn();

// Dernière date de transaction
$derniereTransaction = $pdo->query("SELECT MAX(date_transaction) FROM transactions WHERE client_id = $clientId")->fetchColumn();

// Transactions par mois
$transactionsClientMois = $pdo->query("
    SELECT DATE_FORMAT(date_transaction, '%Y-%m') as mois, COUNT(*) as total
    FROM transactions
    WHERE client_id = $clientId
    GROUP BY mois
    ORDER BY mois
")->fetchAll(PDO::FETCH_ASSOC);

// Liste des dernières transactions
$transactionsRec = $pdo->query("
    SELECT t.*, p.titre 
    FROM transactions t 
    JOIN proprietes p ON t.propriete_id = p.id 
    WHERE t.client_id = $clientId 
    ORDER BY t.date_transaction DESC 
    LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Client</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="dashboard d-flex">
    <!-- Sidebar -->
    <?php include_once "includes/sidebarClient.php"; ?>

    <!-- Contenu principal -->
    <main class="content p-4 w-100">
        <h1 class="mb-4">Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h1>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="stat-box bg-info text-white p-3 rounded shadow-sm">
                    <h4>💸 Mes Transactions</h4>
                    <p class="fs-3"><?= $nbTransactionsClient ?></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="stat-box bg-secondary text-white p-3 rounded shadow-sm">
                    <h4>📅 Dernière Transaction</h4>
                    <p class="fs-4"><?= $derniereTransaction ? $derniereTransaction : 'Aucune' ?></p>
                </div>
            </div>
        </div>

        <!-- Graphique -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3">📊 Historique Transactions / Mois</h5>
                    <div id="graph-transactions-client"></div>
                </div>
            </div>
        </div>

        <!-- Liste des dernières transactions -->
        <div class="card p-3 shadow-sm">
            <h5>📝 Dernières Transactions</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Propriété</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactionsRec as $t): ?>
                        <tr>
                            <td><?= $t['date_transaction'] ?></td>
                            
                            <td><?= htmlspecialchars($t['titre']) ?></td>

                            <td><?= number_format($t['montant'], 2) ?> DT</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

    </main>
    <!-- Barre d'outils avec profil -->
<div class="d-flex justify-content-end mb-3">
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="dropdownProfil" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/images/user.png" alt="Profil" width="32" height="32" class="rounded-circle me-2">
            <?= htmlspecialchars($_SESSION['username']) ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfil">
            <li><a class="dropdown-item" href="changer_motdepasse.php">🔒 Changer le mot de passe</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">🚪 Se déconnecter</a></li>
        </ul>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scripts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    const dataClientTransactions = <?= json_encode($transactionsClientMois) ?>;

    Highcharts.chart('graph-transactions-client', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Transactions par mois'
        },
        xAxis: {
            categories: dataClientTransactions.map(t => t.mois),
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nombre de transactions'
            }
        },
        series: [{
            name: 'Transactions',
            data: dataClientTransactions.map(t => parseInt(t.total))
        }]
    });
</script>
</body>
</html>
