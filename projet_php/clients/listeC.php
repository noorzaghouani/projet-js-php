<?php
session_start();
include_once "../includes/config.php";

// Initialiser les filtres
$nom = $_GET['nom'] ?? '';
$prenom = $_GET['prenom'] ?? '';

// Construire la requête avec filtres
$sql = "SELECT * FROM clients WHERE 1=1";
$params = [];

if (!empty($nom)) {
    $sql .= " AND nom LIKE :nom";
    $params['nom'] = "%$nom%";
}

if (!empty($prenom)) {
    $sql .= " AND prenom LIKE :prenom";
    $params['prenom'] = "%$prenom%";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<div class="dashboard d-flex">

    <!-- Sidebar -->
    <?php include_once "../includes/sidebar.php"; ?>

    <!-- Contenu principal -->
    <main class="content w-100 p-4">
        <div class="container bg-light p-4 rounded shadow">
            <h2 class="text-center mb-4">Liste des Clients</h2>

            <!-- Formulaire de recherche -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-5">
                    <input type="text" name="nom" class="form-control" placeholder="Rechercher par nom" value="<?= htmlspecialchars($nom) ?>">
                </div>
                <div class="col-md-5">
                    <input type="text" name="prenom" class="form-control" placeholder="Rechercher par prénom" value="<?= htmlspecialchars($prenom) ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> Rechercher</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nom']) ?></td>
                            <td><?= htmlspecialchars($row['prenom']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['telephone']) ?></td>
                            <td>
                                <a href="modifierC.php?id=<?= $row['id'] ?>" class="text-warning me-2"><i class="fas fa-edit"></i></a>
                                <a href="supprimerC.php?id=<?= $row['id'] ?>" class="text-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce client ?');">
                                    <i class="fas fa-lock"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($clients)): ?>
                        <tr><td colspan="6">Aucun client trouvé.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
