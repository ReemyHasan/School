<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\ClassSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = ClassSubject::orderBy("created_at", "desc");

        return view("assignSubject.list", ['assignments' => $assignments->paginate(5)]);
    }


    public function create()
    {
        $classes = ClassRoom::orderBy('created_at', 'desc')->get();
        $subject = Subject::orderBy('created_at', 'desc')->get();
        return view('assignSubject.create', ['classes' => $classes, 'subjects' => $subject]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $class_id = $request->get('class_id');
        $subjects = $request->get('subject');
        // dd($subjects);
        $class = ClassRoom::find($class_id);
        foreach ($subjects as $subject) {
            $sub = Subject::find($subject);
            $class->subjects()->attach($sub, ['assigned_by' => Auth::user()->id, 'status' => 1]);
        }
        return redirect()->route('assign_subject.index')->with('success', 'subjects assigned successfully');
    }


    public function edit(ClassRoom $class)
    {
        $subjects = Subject::orderBy('created_at', 'desc')->get();
        $array = $class->subjects->toArray();
        $checked = array();
        foreach ($array as $subject) {
            array_push($checked, $subject['id']);
        }
        // dd($checked);
        // dd($classes, $subject);
        return view(
            'assignSubject.edit',
            [
                'class' => $class,
                'subjects' => $subjects,
                'checked' => $checked
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassRoom $class)
    {
        $classSubjects = $class->subjects->toArray();
        $oldClassSubjects = array();
        foreach ($classSubjects as $subject) {
            array_push($oldClassSubjects, $subject['id']);
        }
        $newClassSubjects = $request->subject;
        // $commonElements = array_intersect($oldClassSubjects, array_values($newClassSubjects));
        foreach ($oldClassSubjects as $subject) {
            if (!in_array($subject, $newClassSubjects)) {
                $class->subjects()->detach($subject);
            }
        }
        // dd($oldClassSubjects, $newClassSubjects);
        $commonElements = array_diff($newClassSubjects, $oldClassSubjects);
        // dd($commonElements);
        foreach ($commonElements as $subject) {
            $class->subjects()->attach($subject, ['assigned_by' => Auth::user()->id]);
        }
        return redirect()->route('assign_subject.index')->with('success', 'subjects assigned successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classSubject = ClassSubject::find($id);
        $subject = $classSubject->subject;
        $class = $classSubject->class;
        $class->subjects()->detach($subject);
        return redirect()->route('assign_subject.index')->with('success', 'assignment deleted successfully');

    }
    public function activate(string $id)
    {
        $classSubject = ClassSubject::find($id);
        if ($classSubject->status == 1)
            ClassSubject::where('id', $classSubject->id)->update(['status' => 0]);
        else if ($classSubject->status == 0)
            ClassSubject::where('id', $classSubject->id)->update(['status' => 1]);
        return redirect()->route('assign_subject.index')->with('success', '');
    }
}
