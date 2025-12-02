<?php
require_once '../core/auth.php';
require_once '../config/db.php';
require_once '../models/UniversityModel.php';
checkAdminLogin();

// 1. Get the University ID
$id = $_GET['id'] ?? null;
if (!$id) { header("Location: dashboard.php"); exit; }

// 2. Fetch Existing Data
$uniModel = new UniversityModel($pdo);
$uni = $uniModel->getById($id);
$deadlines = $uniModel->getDeadlines($id);
$programs = $uniModel->getPrograms($id);

if (!$uni) { die("University not found."); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/base.css">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 800px;">
        <h3 class="mb-4">Edit University</h3>
        
        <form action="university-update.php" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
            
            <input type="hidden" name="id" value="<?php echo $uni['id']; ?>">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($uni['name']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <select name="city" class="form-select">
                        <option value="Islamabad" <?php echo $uni['city'] == 'Islamabad' ? 'selected' : ''; ?>>Islamabad</option>
                        <option value="Lahore" <?php echo $uni['city'] == 'Lahore' ? 'selected' : ''; ?>>Lahore</option>
                        <option value="Karachi" <?php echo $uni['city'] == 'Karachi' ? 'selected' : ''; ?>>Karachi</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Current Logo</label><br>
                <?php if($uni['logo_path']): ?>
                    <img src="../public/uploads/<?php echo $uni['logo_path']; ?>" width="60" class="mb-2">
                <?php endif; ?>
                <input type="file" name="logo" class="form-control" accept="image/*">
                <small class="text-muted">Leave empty to keep current logo.</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control" value="<?php echo htmlspecialchars($uni['website_url']); ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"><?php echo htmlspecialchars($uni['description']); ?></textarea>
            </div>
            
            <div class="alert alert-warning small">
                Note: To edit Deadlines or Programs, please delete the old one and add a new one (Simplified Logic for MVP).
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Update University</button>
            <a href="dashboard.php" class="btn btn-outline-secondary w-100 mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>