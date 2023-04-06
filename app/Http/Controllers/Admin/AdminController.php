<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    private $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function adminDashboard()
    {
        $data = $this->adminRepository->dashboardDataCount();
        // dd($data['user_count']);
        return view('admin.dashboard.dashboard_view', compact('data'));
    }
}
