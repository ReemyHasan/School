<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::getStudentsRecords();
        return view("student.list", ['users' => $users->paginate(3)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('student.show', ['user'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $classes = ClassRoom::orderBy('created_at', 'desc')->get();
        return view('student.edit', ['student'=>$user, 'classes'=>$classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $student = $request->validate(
            [
                'email' => 'email|max:255|unique:users,email,' . $id,
                "name" => "max:25|min:5",
                'image' => 'image',
                'height'=> 'max:3|min:3',
                'weight'=> 'max:3|min:2',
            ]
        );
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('profile', 'public');
            $student['image'] = $image;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $student['admission_number'] = $request->get('admission_number');
        $student['admission_date'] = $request->get('admission_date');
        $student['roll_number'] = $request->get('roll_number');
        $student['cast'] = $request->get('cast');
        $student['mobile_number'] = $request->get('mobile_number');
        $student['date_of_birth'] = $request->get('date_of_birth');
        $student['gender'] = $request->get('gender');
        $student['class_id'] = $request->get('class_id');

        // dd($student);
        $user->update($student);
        return redirect()->route("students.index")->with('success', 'Student Info set Successfully');
    }

}
