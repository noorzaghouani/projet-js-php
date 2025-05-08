<?php
session_start();
include_once "../includes/config.php";

// Vérification du rôle
if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
    exit();
}

// Récupération des filtres
$titre = $_GET['titre'] ?? '';
$adresse = $_GET['adresse'] ?? '';

// Construction de la requête SQL
$sql = "SELECT * FROM proprietes WHERE 1=1";
$params = [];

if (!empty($titre)) {
    $sql .= " AND titre LIKE :titre";
    $params['titre'] = "%$titre%";
}
if (!empty($adresse)) {
    $sql .= " AND adresse LIKE :adresse";
    $params['adresse'] = "%$adresse%";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$proprietes = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Propriétés</title>
    <link rel="stylesheet" href="../assets/css/styleP.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="dashboard d-flex">

    <!-- Sidebar selon le rôle -->
    <?php
        if ($_SESSION['role'] === 'admin') {
            include_once "../includes/sidebar.php";
        } elseif ($_SESSION['role'] === 'client') {
            include_once "../includes/sidebarClient.php";
        }
    ?>

    <main class="content p-4 w-100">
        <div class="container bg-light p-4 rounded shadow">
            <h1 class="text-center mb-4">Liste des Propriétés</h1>

            <!-- Bouton Ajouter + Formulaire de recherche -->
            <div class="row mb-4">
                <?php if ($_SESSION['role'] === 'admin'): ?>
                <div class="col-md-2">
                    <a href="ajouterP.php" class="btn btn-success w-100 mb-2">
                        <i class="fas fa-plus"></i> Ajouter
                    </a>
                </div>
                <?php endif; ?>
                <div class="col-md-5">
                    <form method="GET" class="d-flex gap-2">
                        <input type="text" name="titre" class="form-control" placeholder="Recherche par titre" value="<?= htmlspecialchars($titre) ?>">
                        <input type="text" name="adresse" class="form-control" placeholder="Recherche par adresse" value="<?= htmlspecialchars($adresse) ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!-- Tableau -->
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Adresse</th>
                        <th>Prix location</th>
                        <th>Prix achat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($proprietes)) : ?>
                        <?php foreach ($proprietes as $row) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['titre']) ?></td>
                            <td><?= htmlspecialchars($row['description']) ?></td>
                            <td><?= htmlspecialchars($row['adresse']) ?></td>
                            <td><?= $row['prix_location'] ?> TND</td>
                            <td><?= $row['prix_achat'] ?> TND</td>
                            <td>
                                <?php if ($_SESSION['role'] === 'admin'): ?>
                                    <a href="modifierP.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                                    <a href="supprimerP.php?id=<?= $row['id'] ?>" onclick="return confirmerSuppression();"><i class="fas fa-trash-alt text-danger"></i></a>
                                <?php elseif ($_SESSION['role'] === 'client'): ?>
                                    <a href="AcheterP.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Acheter</a>
                                    <a href="LocationP.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Louer</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Aucune propriété disponible</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="scriptP.js"></script>
<script>
function confirmerSuppression() {
    return confirm("Êtes-vous sûr de vouloir supprimer cette propriété ?");
}
</script>
</body>
</html>
