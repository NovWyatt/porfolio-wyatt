<?php

// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use App\Models\Social;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProjects = Work::count();
        $activeProjects = Work::where('is_active', true)->count();
        $totalSocials = Social::count();
        $totalContacts = Contact::count();

        return view('admin.dashboard', compact(
            'totalProjects',
            'activeProjects',
            'totalSocials',
            'totalContacts'
        ));
    }
}
