<?php
// 1. Load Configuration & Models
require_once '../config/db.php';
require_once '../models/UniversityModel.php';

// 2. Fetch Data
$uniModel = new UniversityModel($pdo);
$searchQuery = $_GET['query'] ?? '';
$cityFilter = $_GET['city'] ?? '';
$universities = $uniModel->getAll($searchQuery, $cityFilter);

// 3. Load Layout
include '../partials/header.php';
include '../partials/navbar.php';
?>

<div class="hero-section">
    <div class="container">
        <h1 class="display-4 hero-title">Find Your Future University.</h1>
        <h2 class="h3 hero-subtitle">All Deadlines, One Place.</h2>
        
        <form action="index.php" method="GET">
            <div class="search-bar-container">
                <i class="bi bi-search text-muted"></i>
                <input type="text" name="query" class="search-input" 
                       placeholder="Search by university name..." 
                       value="<?php echo htmlspecialchars($searchQuery); ?>">
                
                <select name="city" class="city-select form-select-sm" onchange="this.form.submit()">
                    <option value="">City</option>
                    <option value="Islamabad" <?php echo $cityFilter == 'Islamabad' ? 'selected' : ''; ?>>Islamabad</option>
                    <option value="Lahore" <?php echo $cityFilter == 'Lahore' ? 'selected' : ''; ?>>Lahore</option>
                    <option value="Karachi" <?php echo $cityFilter == 'Karachi' ? 'selected' : ''; ?>>Karachi</option>
                </select>
            </div>
        </form>
    </div>
</div>

<div class="bg-light py-5" style="min-height: 60vh;"> <div class="container">
        
        <div class="row g-4"> <?php if (count($universities) > 0): ?>
                <?php foreach ($universities as $uni): ?>
                    <div class="col-md-6 col-lg-4">
                        <a href="university.php?id=<?php echo $uni['id']; ?>" class="text-decoration-none">
                            <div class="uni-card">
                                <div class="uni-logo-container">
                                    <?php if($uni['logo_path']): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($uni['logo_path']); ?>" alt="Logo" class="uni-logo">
                                    <?php else: ?>
                                        <i class="bi bi-bank2 display-4 text-muted"></i>
                                    <?php endif; ?>
                                </div>
                                
                                <h5 class="uni-name"><?php echo htmlspecialchars($uni['name']); ?></h5>
                                <p class="uni-city"><?php echo htmlspecialchars($uni['city']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center mt-5">
                    <p class="text-muted">No universities found.</p>
                </div>
            <?php endif; ?>

        </div>

        <div class="pagination-container text-center">
            <a href="#" class="page-link-custom active">1</a>
            <a href="#" class="page-link-custom">2</a>
            <a href="#" class="page-link-custom">3</a>
            <span class="text-muted mx-2">...</span>
            <a href="#" class="page-link-custom">Next</a>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>
</body>
</html>