<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboards.admin');
    }

    public function teacher()
    {
        return view('dashboards.teacher');
    }

    public function student()
    {
        return view('dashboards.student');
    }

    // Optional jika kamu pakai dashboard umum
    public function index()
    {
        return view('dashboard');
    }
}
