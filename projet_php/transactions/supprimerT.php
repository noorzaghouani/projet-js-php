<?php
include_once "../includes/config.php";
include_once "../includes/auth.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = ?");
$stmt->execute([$id]);

header("Location: listeT.php?deleted=1");
exit();
?>
