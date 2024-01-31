<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::getRecords();
        return view("admin.users.list", ['users' => $users->paginate(3)]);
    }
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($request->password);
        $validated['role'] = intval($request->role);
        // dd($validated);
        User::create($validated);
        return redirect()->route("users.index")->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        // dd($user->id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate(
            [
                'email' => 'email|max:255|unique:users,email,' . $id,
                "name" => "max:25|min:5",
                "password" => "confirmed",
            ]
        );
        $validated['role'] = intval($request->role);
        if (!Hash::isHashed($request->password))
            $validated['password'] = Hash::make($request->password);
        $user->update($validated);
        return redirect()->route("users.index")->with('success', 'User updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route("users.index")->with('success', 'User deleted Successfully');
    }
}
