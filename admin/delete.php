<?php
require_once '../core/auth.php';
require_once '../config/db.php';
checkAdminLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $stmt = $pdo->prepare("DELETE FROM universities WHERE id = :id");
    $stmt->execute([':id' => $_POST['id']]);
}
header("Location: dashboard.php");
?>