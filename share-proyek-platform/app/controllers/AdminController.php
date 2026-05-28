<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Report.php';

class AdminController extends Controller
{
    private $userModel;
    private $reportModel;

	public function __construct()
	{
		$this->requireLogin();

		if ($_SESSION['role'] !== 'admin') {
			die('Akses ditolak');
		}

		$this->userModel = new User();
		$this->reportModel = new Report();
	}

    public function index()
    {
        $data = [
            'users' => $this->userModel->getAllUsers(),
            'reports' => $this->reportModel->getAllReports(),
            'totalUsers' => $this->userModel->countUsers(),
            'totalReports' => $this->reportModel->countReports()
        ];

        $this->view('admin_dashboard', $data);
    }

    public function delete($id)
    {
        $this->reportModel->deleteReport($id);

        $_SESSION['success'] = 'Laporan berhasil dihapus';

        $this->redirect('/admin');
    }
}
