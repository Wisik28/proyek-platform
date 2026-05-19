<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'environmental_reporting');
define('DB_USER', 'root');  // Change to your DB user
define('DB_PASS', '');      // Change to your DB password
define('DB_CHARSET', 'utf8mb4');

class DatabaseConfig {
    public static function getDsn() {
        return "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    }
    
    public static function getOptions() {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }
}
?>