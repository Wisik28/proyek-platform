<?php
require_once __DIR__ . '/../core/Model.php';

class Report extends Model {
    public function create($userId, $title, $description, $location, $reportDate) {
        $stmt = $this->db->prepare(
            "INSERT INTO reports (user_id, title, description, location, report_date) 
             VALUES (:user_id, :title, :description, :location, :report_date)"
        );
        
        return $stmt->execute([
            'user_id' => $userId,
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'report_date' => $reportDate
        ]);
    }

    public function getUserReports($userId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM reports WHERE user_id = :user_id ORDER BY created_at DESC"
        );
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }
}
?>