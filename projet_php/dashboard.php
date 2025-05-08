<?php
//require_once 'config.php';
//$pdo = $GLOBALS['pdo'];
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
include_once "includes/config.php";

// Récupérer les données
$nbClients = $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();
$nbProprietes = $pdo->query("SELECT COUNT(*) FROM proprietes")->fetchColumn();
$nbTransactions = $pdo->query("SELECT COUNT(*) FROM transactions")->fetchColumn();

// Transactions par mois (pour graphique)
$transactionsParMois = $pdo->query("
    SELECT DATE_FORMAT(date_transaction, '%Y-%m') as mois, COUNT(*) as total
    FROM transactions
    GROUP BY mois
    ORDER BY mois
")->fetchAll(PDO::FETCH_ASSOC);

// Clients et propriétés par adresse (pour graphique)
$statsAdresses = $pdo->query(" SELECT adresse, 
        (SELECT COUNT(*) FROM clients WHERE adresse = p.adresse) AS total_clients,
        COUNT(p.id) AS total_proprietes
    FROM proprietes p
    GROUP BY adresse
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="dashboard d-flex">
    <!-- Sidebar -->
    <!-- <aside class="sidebar p-3">
        <h2 class="text-white">🏠 ImmoDash</h2>
      <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link text-white" href="dashboard.php">🏠 Tableau de bord </a></li>
    <li class="nav-item"><a class="nav-link text-white" href="proprietes/listeP.php">🏢 Propriétés</a></li>

    <?php if ($_SESSION['role'] === 'admin'): ?>
        <li class="nav-item"><a class="nav-link text-white" href="clients/listeC.php">👥 Clients</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="transactions/listeT.php">💸 Transactions</a></li>

    <?php endif; ?>
 <?php if ($_SESSION['role'] === 'client'): ?>
        <li class="nav-item"><a class="nav-link text-white" href="transactions/TransationC.php">💸 Transactions</a></li>
         <?php endif; ?>
    <li class="nav-item"><a class="nav-link text-danger" href="logout.php">🚪 Déconnexion</a></li>
</ul>

    </aside> -->
<?php include_once "includes/sidebar.php"; ?>
    <!-- Main -->
    <main class="content p-4 w-100">
        <h1 class="mb-4">Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h1>
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="stat-box bg-primary text-white p-3 rounded shadow-sm">
                    <h4>👥 Clients</h4>
                    <p class="fs-3"><?= $nbClients ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box bg-success text-white p-3 rounded shadow-sm">
                    <h4>🏠 Propriétés</h4>
                    <p class="fs-3"><?= $nbProprietes ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-box bg-warning text-dark p-3 rounded shadow-sm">
                    <h4>💸 Transactions</h4>
                    <p class="fs-3"><?= $nbTransactions ?></p>
                </div>
            </div>
        </div>

        <!-- Graphiques -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3">📅 Transactions par mois</h5>
                    <div id="graph-transactions"></div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="mb-3">🏘️ Clients vs Propriétés par Adresse</h5>
                    <div id="graph-adresse"></div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="assets/js/dashboard.js"></script>
<script>
    const dataTransactions = <?= json_encode($transactionsParMois) ?>;
    const dataAdresses = <?= json_encode($statsAdresses) ?>;
</script>
</body>
</html>
