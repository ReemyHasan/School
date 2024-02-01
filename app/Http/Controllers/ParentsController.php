<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::getParentsRecords();
        return view("parent.list", ['users' => $users->paginate(3)]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        $my_students = $user->myStudent;
        // dd($my_students);
        return view('parent.show', ['user' => $user, 'myStudents'=> $my_students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('parent.edit', ['parent' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $parent = $request->validate(
            [
                'email' => 'email|max:255|unique:users,email,' . $id,
                "name" => "max:25|min:5",
                'image' => 'image',
            ]
        );
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('profile', 'public');
            $parent['image'] = $image;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $parent['occupation'] = $request->get('occupation');
        $parent['address'] = $request->get('address');
        $parent['mobile_number'] = $request->get('mobile_number');
        $parent['gender'] = $request->get('gender');
        $parent['status'] = $request->get('status');

        $user->update($parent);
        return redirect()->route("parents.index")->with('success', 'Parent Info set Successfully');
    }

}
