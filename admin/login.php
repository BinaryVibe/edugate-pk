<?php
session_start();
if (isset($_SESSION['admin_id'])) { header("Location: dashboard.php"); exit; }
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../config/db.php';
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :email");
    $stmt->execute([':email' => $_POST['email']]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../public/assets/css/base.css">
    <link rel="stylesheet" href="assets/css/admin-login.css">
    <link rel="stylesheet" href="/edugate-pakistan/public/assets/css/base.css">
</head>
<body>
    <div class="login-card">
        <h2 class="mb-4 fw-bold">EduGate Admin</h2>
        <?php if($error): ?><div style="color:red; margin-bottom:15px;"><?php echo $error; ?></div><?php endif; ?>
        <form method="POST">
            <input type="email" name="email" class="form-control-custom" placeholder="Email" required>
            <input type="password" name="password" class="form-control-custom" placeholder="Password" required>
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>