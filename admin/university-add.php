<?php require_once '../core/auth.php'; checkAdminLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/base.css">
    <link rel="stylesheet" href="assets/css/admin-dashboard.css">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 800px;">
        <h3 class="mb-4">Add New University</h3>
        <form action="handle-submit.php" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">City</label>
                    <select name="city" class="form-select"><option>Islamabad</option><option>Lahore</option><option>Karachi</option></select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <hr>
            <h5 class="mb-3">Deadlines</h5>
            <div id="deadlines-container"></div>
            <button type="button" id="add-deadline-btn" class="btn btn-outline-success w-100 mb-4 dashed-border">+ Add Deadline</button>

            <h5 class="mb-3">Programs</h5>
            <div id="programs-container"></div>
            <button type="button" id="add-program-btn" class="btn btn-outline-success w-100 mb-4 dashed-border">+ Add Program</button>

            <button type="submit" class="btn btn-emerald w-100 py-2">Save University</button>
        </form>
    </div>
    <script src="assets/js/admin-form.js"></script>
</body>
</html>