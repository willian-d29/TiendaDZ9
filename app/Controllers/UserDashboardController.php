<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user');
    }
}
