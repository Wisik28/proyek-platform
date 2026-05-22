<?php

require_once __DIR__ . '/../core/Model.php';

class Admin extends Model
{
    public function getTotalUsers()
    {
        $stmt = $this->db->query("
            SELECT COUNT(*) as total
            FROM users
        ");

        return $stmt->fetch();
    }

    public function getTotalReports()
    {
        $stmt = $this->db->query("
            SELECT COUNT(*) as total
            FROM reports
        ");

        return $stmt->fetch();
    }
}
