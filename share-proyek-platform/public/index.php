<?php
// Bootstrapping
// Agar dapat memanggil seluruh aplikasi MVC
// require_once '../app/init.php';

session_start();

// Define root path
define('ROOT_PATH', dirname(__DIR__));

// Autoloader
spl_autoload_register(function ($class_name) {
    $paths = [
        __DIR__ . '/../app/controllers/',
        __DIR__ . '/../app/models/',
        __DIR__ . '/../app/core/'
    ];
    
    foreach ($paths as $path) {
        $file = $path . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Router
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$path = trim($path, '/');

switch ($path) {
    case '':
    case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    
    case strpos($path, 'register-post') === 0:
        $controller = new AuthController();
        $controller->register();
        break;
    
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    
    case strpos($path, 'login-post') === 0:
        $controller = new AuthController();
        $controller->login();
        break;
    
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    
    case 'report':
        $controller = new ReportController();
        $controller->index();
        break;
    
    case strpos($path, 'report-create') === 0:
        $controller = new ReportController();
        $controller->create();
        break;

    case 'admin':
		$controller = new AdminController();
		$controller->index();
		break;

	case preg_match('/^admin\/delete\/(\d+)$/', $path, $matches) ? true : false:
		$controller = new AdminController();
		$controller->delete($matches[1]);
		break;
    
    default:
        echo "<h1>404 - Page Not Found</h1>";
        break;
}
?>
