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

    //DASHBOARD_ADMIN

    public function getAllReports()
    {
        $stmt = $this->db->prepare(
            "SELECT reports.*, users.username
             FROM reports
             JOIN users
             ON reports.user_id = users.id
             ORDER BY reports.created_at DESC");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countReports()
    {
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) AS total
             FROM reports");

        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteReport($id)
    {
        $stmt = $this->db->prepare(
            "DELETE FROM reports
             WHERE id = :id");

        return $stmt->execute([
            'id' => $id]);
    }
}
?>
