<?php
class UniversityModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll($search = "", $city = "") {
        $sql = "SELECT * FROM universities WHERE 1=1";
        $params = [];
        if (!empty($search)) {
            $sql .= " AND name LIKE :search";
            $params[':search'] = "%$search%";
        }
        if (!empty($city)) {
            $sql .= " AND city = :city";
            $params[':city'] = $city;
        }
        $sql .= " ORDER BY name ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM universities WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function getDeadlines($university_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM admission_deadlines WHERE university_id = :id ORDER BY start_date DESC");
        $stmt->execute([':id' => $university_id]);
        return $stmt->fetchAll();
    }

    public function getPrograms($university_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM programs WHERE university_id = :id ORDER BY program_name ASC");
        $stmt->execute([':id' => $university_id]);
        return $stmt->fetchAll();
    }
}
?>