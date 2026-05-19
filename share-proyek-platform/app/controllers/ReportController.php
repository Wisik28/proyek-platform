<?php
// session_start();
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Report.php';

class ReportController extends Controller {
    private $reportModel;

    public function __construct() {
        $this->reportModel = new Report();
        $this->requireLogin();
    }

    public function index() {
        $reports = $this->reportModel->getUserReports($_SESSION['user_id']);
        $this->view('report_dashboard', ['reports' => $reports]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $location = trim($_POST['location']);
            $reportDate = $_POST['report_date'];

            if (empty($title) || empty($description) || empty($location) || empty($reportDate)) {
                $_SESSION['error'] = 'All fields are required';
                $this->redirect('/report');
                return;
            }

            if ($this->reportModel->create(
                $_SESSION['user_id'],
                $title,
                $description,
                $location,
                $reportDate
            )) {
                $_SESSION['success'] = 'Report submitted successfully!';
                $this->redirect('/report');
            } else {
                $_SESSION['error'] = 'Failed to submit report';
                $this->redirect('/report');
            }
        }
    }
}
?>