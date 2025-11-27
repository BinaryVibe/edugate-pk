<?php
require_once '../core/auth.php';
require_once '../config/db.php';
checkAdminLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo->beginTransaction();
        
        // Upload Logo
        $logoPath = null;
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === 0) {
            $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $logoPath = 'uni_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['logo']['tmp_name'], '../public/uploads/' . $logoPath);
        }

        // Insert University
        $stmt = $pdo->prepare("INSERT INTO universities (name, city, website_url, description, logo_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['city'], $_POST['website_url'], $_POST['description'], $logoPath]);
        $uniId = $pdo->lastInsertId();

        // Insert Deadlines
        if (!empty($_POST['deadlines'])) {
            $stmt = $pdo->prepare("INSERT INTO admission_deadlines (university_id, title, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)");
            foreach ($_POST['deadlines'] as $d) {
                $stmt->execute([$uniId, $d['title'], $d['start_date'], $d['end_date'], $d['status']]);
            }
        }

        // Insert Programs
        if (!empty($_POST['programs'])) {
            $stmt = $pdo->prepare("INSERT INTO programs (university_id, program_name, criteria) VALUES (?, ?, ?)");
            foreach ($_POST['programs'] as $p) {
                $stmt->execute([$uniId, $p['name'], $p['criteria']]);
            }
        }

        $pdo->commit();
        header("Location: dashboard.php");
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Error: " . $e->getMessage());
    }
}
?>