<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::getAdminsRecords();
        return view("admin.list", ['users' => $users->paginate(3)]);
    }
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.show', ['user'=> $user]);
    }

}
