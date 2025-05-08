<?php
include_once "../includes/config.php";

// Récupération de l'ID passé en GET
$id = $_GET['id'];

// Requête pour récupérer la propriété à modifier
$stmt = $pdo->prepare("SELECT * FROM proprietes WHERE id = ?");
$stmt->execute([$id]);
$propriete = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $adresse = $_POST['adresse'];
    $prix_location = $_POST['prix_location'];
    $prix_achat = $_POST['prix_achat'];

    // Requête de mise à jour
    $update = $pdo->prepare("UPDATE proprietes SET titre = ?, description = ?, adresse = ?, prix_location = ?, prix_achat = ? WHERE id = ?");
    $update->execute([$titre, $description, $adresse, $prix_location, $prix_achat, $id]);

    header("Location: listeP.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Propriété</title>
    <link rel="stylesheet" href="../assets/css/modifierP.css">
</head>

    <div class="container">
        <div class="form-container">
            <h1 class="mb-4">Modifier la Propriété</h1>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Titre *</label>
                    <input type="text" class="form-control" name="titre" 
                           value="<?= htmlspecialchars($propriete['titre']) ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea class="form-control" name="description" rows="5" required><?= 
                        htmlspecialchars($propriete['description']) 
                    ?></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Adresse *</label>
                    <input type="text" class="form-control" name="adresse" 
                           value="<?= htmlspecialchars($propriete['adresse']) ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Prix de location (TND) *</label>
                        <input type="number" step="0.01" min="0" class="form-control" 
                               name="prix_location" value="<?= htmlspecialchars($propriete['prix_location']) ?>" required>
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label">Prix d'achat (TND) *</label>
                        <input type="number" step="0.01" min="0" class="form-control" 
                               name="prix_achat" value="<?= htmlspecialchars($propriete['prix_achat']) ?>" required>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                   
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                     <button><a href="listeP.php" class="btn btn-secondary btn-cancel">Annuler</a></button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
