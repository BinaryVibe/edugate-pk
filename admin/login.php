<?php
session_start();

// 1. Redirect if already logged in
if (isset($_SESSION['admin_id'])) { 
    header("Location: dashboard.php"); 
    exit; 
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../config/db.php';
    
    // 2. Sanitize: Remove accidental spaces from start/end
    // The '??' operator prevents errors if the field is missing entirely
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // 3. Validation Layer
    if (empty($email) || empty($password)) {
        $error = "Please fill in both fields.";
    } 
    // Check if email looks like a real email (e.g., has @ and .)
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } 
    else {
        // 4. Authentication Layer
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password'])) {
            // Success: Start Session
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            header("Location: dashboard.php");
            exit;
        } else {
            // Failure: Generic message for security (don't say which one is wrong)
            $error = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/edugate-pk/public/assets/css/base.css">
    <link rel="stylesheet" href="/edugate-pk/admin/assets/css/admin-login.css">
</head>
<body>
    <div class="login-card">
        <h2 class="mb-4 fw-bold">EduGate Admin</h2>
        
        <?php if($error): ?>
            <div style="color: #b91c1c; background-color: #fef2f2; border: 1px solid #f87171; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 0.9rem;">
                <i class="bi bi-exclamation-circle-fill me-2"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="email" name="email" class="form-control-custom" placeholder="Email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
            
            <input type="password" name="password" class="form-control-custom" placeholder="Password" required>
            
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>