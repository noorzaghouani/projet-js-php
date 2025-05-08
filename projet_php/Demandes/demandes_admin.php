<?php
session_start();
include_once "../includes/config.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$stmt = $pdo->query("SELECT d.*, c.nom, c.prenom, p.titre 
    FROM demandes d 
    JOIN clients c ON d.id_client = c.id 
    JOIN proprietes p ON d.id_propriete = p.id 
    ORDER BY d.id DESC");
$demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demandes des clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar-container {
            width: 250px;
            min-height: 100vh;
        }
        .content-container {
            flex: 1;
            padding: 20px;
        }
        .main-container {
            display: flex;
            min-height: 100vh;
        }
    </style>
</head>
<body class="bg-light">
    <div class="main-container">
        <!-- Sidebar à gauche -->
        <div class="sidebar-container bg-dark">
            <?php include_once "../includes/sidebar.php"; ?>
        </div>
        
        <!-- Contenu principal à droite -->
        <div class="content-container">
            <div class="container-fluid">
                <h3 class="mb-4">Toutes les demandes</h3>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover bg-white shadow">
                        <thead class="table-dark">
                            <tr>
                                <th>Client</th>
                                <th>Propriété</th>
                                <th>Type</th>
                                <th>Prix</th>
                                <th>Message</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($demandes as $d): ?>
                            <tr>
                                <td><?= $d['prenom'] . ' ' . $d['nom'] ?></td>
                                <td><?= htmlspecialchars($d['titre']) ?></td>
                                <td><?= $d['type'] ?></td>
                                <td><?= number_format($d['prix'], 2) ?> TND</td>
                                <td><?= htmlspecialchars($d['message']) ?></td>
                                <td>
                                    <?php
                                        if ($d['statut'] == 'accepter') echo "<span class='badge bg-success'>Acceptée</span>";
                                        elseif ($d['statut'] == 'refuser') echo "<span class='badge bg-danger'>Refusée</span>";
                                        else echo "<span class='badge bg-warning text-dark'>En attente</span>";
                                    ?>
                                </td>
                                <td>
                                    <?php if ($d['statut'] === 'en attente'): ?>
                                        <a href="traiter_demande.php?id=<?= $d['id'] ?>&action=accepter" class="btn btn-sm btn-success">Accepter</a>
                                        <a href="traiter_demande.php?id=<?= $d['id'] ?>&action=refuser" class="btn btn-sm btn-danger">Refuser</a>
                                    <?php else: ?>
                                        <span class="text-muted">Déjà traité</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>