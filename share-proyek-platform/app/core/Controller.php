<!-- Kelas ini merupakan kelas utama, sedangkan kelas yang
 ada dalam folder 'controllers' nantinya akan extends ke kelas 'Controller.php' ini -->

<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }

    protected function redirect($url) {
        header("Location: " . $url);
        exit();
    }

    protected function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    protected function requireLogin() {
        if (!$this->isLoggedIn()) {
            header("Location: /login");
            exit();
        }
    }
}
?>