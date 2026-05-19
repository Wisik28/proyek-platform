<?php
// session_start();
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showRegister() {
        $this->view('register');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            // Basic validation
            if (empty($username) || empty($email) || empty($password)) {
                $_SESSION['error'] = 'All fields are required';
                $this->redirect('/register');
                return;
            }

            if (strlen($password) < 6) {
                $_SESSION['error'] = 'Password must be at least 6 characters';
                $this->redirect('/register');
                return;
            }

            // Check if user exists
            if ($this->userModel->findByUsername($username) || $this->userModel->findByEmail($email)) {
                $_SESSION['error'] = 'Username or email already exists';
                $this->redirect('/register');
                return;
            }

            if ($this->userModel->register($username, $email, $password)) {
                $_SESSION['success'] = 'Registration successful! Please login.';
                $this->redirect('/login');
            } else {
                $_SESSION['error'] = 'Registration failed. Try again.';
                $this->redirect('/register');
            }
        }
    }

    public function showLogin() {
        $this->view('login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $user = $this->userModel->findByUsername($username);
            
            if ($user && $this->userModel->verifyPassword($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['success'] = 'Login successful!';
                $this->redirect('/report');
            } else {
                $_SESSION['error'] = 'Invalid credentials';
                $this->redirect('/login');
            }
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/login');
    }
}
?>