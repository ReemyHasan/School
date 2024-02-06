<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::getRecords();
        $subject = Subject::orderBy('created_at', 'desc')->get();
        return view("exam.list", ['exams'=>$exams->paginate(10), 'subjects' => $subject]);
    }

    public function create()
    {
        $subject = Subject::orderBy('created_at', 'desc')->get();
        return view('exam.create', ['subjects' => $subject]);
    }

    public function store(Request $request)
    {
        Exam::create($request->except('_token'));
        return redirect()->route('exams.index')->with('success','exam added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $exam = Exam::find($id);
        $subject = Subject::orderBy('created_at', 'desc')->get();
        return view('exam.edit', ['exam'=> $exam,  'subjects' => $subject]);
    }
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $exam = Exam::find($id);
        $exam->update($request->except(['_token','_method']));
        return redirect()->route('exams.index')->with('success','exam edited successfully');
    }

    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect()->route("exams.index")->with('success', 'Exam deleted Successfully');
    }
}
