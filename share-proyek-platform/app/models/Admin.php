<?php

require_once __DIR__ . '/../core/Model.php';

class Admin extends Model
{
    public function getTotalUsers()
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) as total FROM users"
        );

        return $stmt->fetch();
    }

    public function getTotalReports()
    {
        $stmt = $this->db->query(
            "SELECT COUNT(*) as total FROM reports"
        );

        return $stmt->fetch();
    }

    public function getRecentReports()
    {
        $stmt = $this->db->query("
            SELECT reports.*, users.username
            FROM reports
            JOIN users ON reports.user_id = users.id
            ORDER BY reports.created_at DESC
            LIMIT 10
        ");

        return $stmt->fetchAll();
    }
}
