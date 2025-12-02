<?php
require_once '../core/auth.php';
checkAdminLogin();
require_once '../config/db.php';
require_once '../models/UniversityModel.php';
$uniModel = new UniversityModel($pdo);
$universities = $uniModel->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../public/assets/css/base.css">
    <link rel="stylesheet" href="assets/css/admin-dashboard.css">
</head>
<body class="bg-light">
    <header class="admin-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="fw-bold h5 mb-0">EduGate Admin</div>
            <a href="logout.php" class="text-white text-decoration-none">Logout</a>
        </div>
    </header>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>University Management</h2>
            <a href="university-add.php" class="btn btn-emerald">+ Add New University</a>
        </div>
        <div class="list-container">
            <?php foreach ($universities as $uni): ?>
                <div class="uni-list-item">
                    <div class="d-flex align-items-center">
                        <div class="uni-icon-box">
                            <?php if($uni['logo_path']): ?><img src="../public/uploads/<?php echo $uni['logo_path']; ?>" style="width:100%;height:100%;object-fit:contain;"><?php endif; ?>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($uni['name']); ?></h6>
                            <small class="text-muted"><?php echo htmlspecialchars($uni['city']); ?></small>
                        </div>
                    </div>
                    <a href="university-edit.php?id=<?php echo $uni['id']; ?>" class="btn btn-sm btn-outline-secondary">
    <i class="bi bi-pencil-square"></i> Edit
</a>
                    <form action="delete.php" method="POST" onsubmit="return confirm('Delete this university?');">
                        <input type="hidden" name="id" value="<?php echo $uni['id']; ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>