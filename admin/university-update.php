<?php
require_once '../core/auth.php';
require_once '../config/db.php';
checkAdminLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    // 1. Handle Logo Upload (Optional)
    // We only update the logo field if the user actually selected a file
    $logoSQL = ""; 
    $params = [
        ':name' => $_POST['name'],
        ':city' => $_POST['city'],
        ':url'  => $_POST['website_url'],
        ':desc' => $_POST['description'],
        ':id'   => $id
    ];

    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
        $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $logoPath = 'uni_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['logo']['tmp_name'], '../public/uploads/' . $logoPath);
        
        // Add logo to update query
        $logoSQL = ", logo_path = :logo";
        $params[':logo'] = $logoPath;
    }

    // 2. Run Update Query
    $sql = "UPDATE universities 
            SET name = :name, city = :city, website_url = :url, description = :desc $logoSQL 
            WHERE id = :id";
            
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    // 3. Redirect back to Dashboard
    header("Location: dashboard.php");
    exit;
}
?>