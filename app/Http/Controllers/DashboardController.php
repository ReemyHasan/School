<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = "Dashboard";
        if (Auth::user()->role == 1)
            return view("admin.dashboard", ["data"=> $data]);
        else if (Auth::user()->role == 2)
            return view("teacher.dashboard", ["data"=> $data]);
        else if (Auth::user()->role == 3)
            return view("student.dashboard", ["data"=> $data]);
        else if (Auth::user()->role == 4)
            return view("parent.dashboard", ["data"=> $data]);
    }
}
