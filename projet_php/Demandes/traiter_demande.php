<?php
session_start();
include_once "../includes/config.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$action = $_GET['action']; // doit être "accepter" ou "refuser"

if ($id > 0 && in_array($action, ['accepter', 'refuser'])) {
    $stmt = $pdo->prepare("UPDATE demandes SET statut = ? WHERE id = ?");
    $stmt->execute([$action, $id]);
    echo "<script>alert('Demande $action avec succès');window.location='demandes_admin.php';</script>";
    exit();
} else {
    echo "Paramètres invalides.";
}
?>
