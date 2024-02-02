<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $users = User::getTeachersRecords();
        return view("teacher.list", ['users' => $users->paginate(3)]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        $teacher_classes_students = $user->teacher_classes_students;

        // dd($teacher_classes_students->toArray());
        // $subjects = $user->subjects;
        // $classes  = array();
        // foreach ($subjects as $subject) {
        //     // Arr::add($classes, $subject->classes());
        //     array_push($classes, $subject->classes);
        // }
        // //  dd($classes);
        // // dd($my_students);
         return view('teacher.show', ['user' => $user,'teacher_classes_students' => $teacher_classes_students]);
    }
    public function edit(string $id)
    {
        $user = User::find($id);
        $subjects = Subject::orderBy('id', 'desc')->get();
        $array = $user->subjects->toArray();
        $checked = array();
        foreach ($array as $subject) {
            array_push($checked, $subject['id']);
        }
        return view('teacher.edit', ['teacher' => $user, 'subjects' => $subjects, 'checked' => $checked]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $teacher = $request->validate(
            [
                'email' => 'email|max:255|unique:users,email,' . $id,
                "name" => "max:25|min:5",
                'image' => 'image',
            ]
        );
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('profile', 'public');
            $teacher['image'] = $image;
            Storage::disk('public')->delete($user->image ?? '');
        }
        $teacher['address'] = $request->get('address');
        $teacher['mobile_number'] = $request->get('mobile_number');
        $teacher['gender'] = $request->get('gender');
        $teacher['status'] = $request->get('status');
        $newSubjects = $request->get('subject_id');
        $array = $user->subjects->toArray();
        $oldSubjects = array();
        foreach ($array as $subject) {
            array_push($oldSubjects, $subject['id']);
        }
        foreach ($oldSubjects as $subject) {
            if (!in_array($subject, $newSubjects)) {

                $sub = Subject::find($subject);
                $sub->update(['teacher_id' => null]);
            }
        }
        // dd($oldClassSubjects, $newClassSubjects);
        $newElements = array_diff($newSubjects, $oldSubjects);
        // dd($commonElements);
        foreach ($newElements as $subject) {

            $sub = Subject::find($subject);
            $sub->update(['teacher_id' => $id]);
        }

        $user->update($teacher);
        return redirect()->route("teachers.index")->with('success', 'Teacher Info set Successfully');
    }
    public function subjects(string $id)
    {
        $user = User::find($id);
        $subjects = $user->subjects;
        // dd($subjects);
        return view('teacher.subjects',['subjects'=> $subjects,'teacher'=> $user]);
    }
}
