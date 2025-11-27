<?php
require_once '../config/db.php';
require_once '../models/UniversityModel.php';
$id = $_GET['id'] ?? null;
if (!$id) header("Location: index.php");

$uniModel = new UniversityModel($pdo);
$university = $uniModel->getById($id);
$deadlines = $uniModel->getDeadlines($id);
$programs = $uniModel->getPrograms($id);
if (!$university) die("University not found.");
include '../partials/header.php';
?>
<link rel="stylesheet" href="assets/css/university.css">
<?php include '../partials/navbar.php'; ?>

<div class="uni-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2 text-center text-md-start">
                <?php if($university['logo_path']): ?>
                    <img src="uploads/<?php echo htmlspecialchars($university['logo_path']); ?>" class="uni-logo-large">
                <?php else: ?>
                    <div class="uni-logo-large d-flex align-items-center justify-content-center bg-light"><i class="bi bi-bank2 h1 text-muted"></i></div>
                <?php endif; ?>
            </div>
            <div class="col-md-10">
                <h1 class="fw-bold mb-1"><?php echo htmlspecialchars($university['name']); ?></h1>
                <p class="text-muted mb-2"><i class="bi bi-geo-alt-fill text-emerald"></i> <?php echo htmlspecialchars($university['city']); ?></p>
                <div class="mt-3">
                    <a href="<?php echo htmlspecialchars($university['website_url']); ?>" target="_blank" class="btn-action">Official Website</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-5">
                <h3 class="fw-bold mb-4">Admission Deadlines</h3>
                <table class="custom-table">
                    <?php foreach($deadlines as $d): ?>
                        <tr>
                            <td class="fw-bold"><?php echo htmlspecialchars($d['title']); ?></td>
                            <td class="text-muted"><?php echo date('d M Y', strtotime($d['start_date'])) . ' - ' . date('d M Y', strtotime($d['end_date'])); ?></td>
                            <td class="text-end">
                                <span class="status-badge <?php echo $d['status'] == 'Open' ? 'status-open' : ($d['status'] == 'Closed' ? 'status-closed' : 'status-upcoming'); ?>">
                                    <?php echo htmlspecialchars($d['status']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if(empty($deadlines)) echo "<tr><td colspan='3' class='text-muted'>No deadlines found.</td></tr>"; ?>
                </table>
            </div>
            <div class="mb-5">
                <h3 class="fw-bold mb-4">Programs Offered</h3>
                <div class="row g-3">
                    <?php foreach($programs as $p): ?>
                        <div class="col-md-6"><div class="p-3 bg-light rounded text-center fw-bold text-dark"><?php echo htmlspecialchars($p['program_name']); ?></div></div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="content-card">
                <h4 class="fw-bold mb-3">About</h4>
                <p class="text-muted small"><?php echo nl2br(htmlspecialchars($university['description'])); ?></p>
            </div>
        </div>
    </div>
</div>
<?php include '../partials/footer.php'; ?>