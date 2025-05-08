<?php
session_start();
include_once "../includes/config.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') {
    header("Location: ../index.php");
    exit();
}

$id_client = $_SESSION['client_id'];
$stmt = $pdo->prepare("SELECT d.*, p.titre FROM demandes d JOIN proprietes p ON d.id_propriete = p.id WHERE d.id_client = ?");
$stmt->execute([$id_client]);
$demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Demandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/mesdemandes.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
        }

        .sidebar h4 {
            margin-bottom: 30px;
        }

        .sidebar .nav-link {
            color: #fff;
            margin-bottom: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #495057;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            flex-grow: 1;
            width: calc(100% - 250px);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<!-- <div class="sidebar">
    <h4><i class="bi bi-person-circle me-2"></i>Espace Client</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="dashboardCl.php"><i class="bi bi-house-door me-2"></i>Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="TransationC.php"><i class="bi bi-cash-stack me-2"></i>Transactions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ProprietesC.php"><i class="bi bi-building me-2"></i>Propriétés</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="MesDemandes.php"><i class="bi bi-hourglass-split me-2"></i>Mes demandes</a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="../logout.php"><i class="bi bi-box-arrow-right me-2"></i>Déconnexion</a>
        </li>
    </ul>
</div> -->
 <?php include_once "../includes/sidebarClient.php"; ?>
<!-- Contenu principal -->
<div class="main-content">
    <h3 class="mb-4">Mes demandes</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover bg-white shadow-sm">
            <thead class="table-secondary">
                <tr>
                    <th>Propriété</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Message</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande): ?>
                    <tr>
                        <td><?= htmlspecialchars($demande['titre']) ?></td>
                        <td><?= ucfirst($demande['type']) ?></td>
                        <td><?= number_format($demande['prix'], 2) ?> TND</td>
                        <td><?= htmlspecialchars($demande['message']) ?></td>
                        <td>
                            <?php
                                if ($demande['statut'] == 'accepter') echo "<span class='badge bg-success'>Acceptée</span>";
                                elseif ($demande['statut'] == 'refuser') echo "<span class='badge bg-danger'>Refusée</span>";
                                else echo "<span class='badge bg-warning text-dark'>En attente</span>";
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
