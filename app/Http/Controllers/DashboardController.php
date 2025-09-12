<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superadmindashboard()
    {
        // Logic for the super admin dashboard
        return view('superadmin.dashboard');
    }
}
