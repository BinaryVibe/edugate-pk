<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduGate Pakistan</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/edugate-pk/public/assets/css/base.css">
    
    <?php if (basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['PHP_SELF'], 'admin') === false): ?>
        <link rel="stylesheet" href="/edugate-pk/public/assets/css/home.css">
    <?php endif; ?>
    
    <?php if (basename($_SERVER['PHP_SELF']) == 'university.php'): ?>
        <link rel="stylesheet" href="/edugate-pk/public/assets/css/university.css">
    <?php endif; ?>

    <?php if (strpos($_SERVER['REQUEST_URI'], '/admin/') !== false): ?>
        <link rel="stylesheet" href="/edugate-pk/admin/assets/css/admin-login.css">
        <?php if (basename($_SERVER['PHP_SELF']) == 'dashboard.php'): ?>
             <link rel="stylesheet" href="/edugate-pk/admin/assets/css/admin-dashboard.css">
        <?php endif; ?>
         <?php if (basename($_SERVER['PHP_SELF']) == 'university-add.php'): ?>
             <link rel="stylesheet" href="/edugate-pk/admin/assets/css/admin-form.css">
        <?php endif; ?>
    <?php endif; ?>
</head>
<body class="d-flex flex-column min-vh-100">