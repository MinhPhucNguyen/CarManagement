<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userNumber = User::count();
        $usersList = User::orderBy('id', 'desc')->simplePaginate(5);
        return view('admin.dashboard', compact('userNumber', 'usersList'));
    }
}
