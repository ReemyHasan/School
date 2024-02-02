<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::orderBy("created_at", "desc");
        if(request()->has("Search")){
        $subjects = $subjects->search(request("Search",""));
        }
        if(request()->has("date")){
            $subjects = $subjects->search(request("date",""));
            }
        return view("subject.list", ['subjects' => $subjects->paginate(3)]);
    }
    public function create()
    {
        return view("subject.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "max:225|min:5|unique:subjects|required",
            "type" => "min:3|max:255|required",
        ]);
        $validated['created_by'] = Auth::user()->id;
        $validated['status'] = intval($request->status);
        Subject::create($validated);
        return redirect()->route("subjects.index")->with('success', 'Subject Created Successfully');
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
        $subject = Subject::find($id);
        // dd($subject->id);
        return view('subject.edit', ['subject' => $subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $subject = Subject::find($id);
        $validated = $request->validate(
            [
                "name" => "max:225|min:5|unique:subjects,name," . $id,
                "type" => "min:3|max:255|required",
            ]
            );
        $validated['created_by'] = Auth::user()->id;
        $validated['status'] = intval($request->status);
        // dd($validated);
        $subject->update($validated);
        return redirect()->route("subjects.index")->with('success', 'Subject updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route("subjects.index")->with('success', 'Subject deleted Successfully');
    }
    public function classes($id){
        $subject = Subject::find($id);
        $classes = $subject->classes;
        // dd($classes);
        return view('subject.classesRelated', ['classes'=> $classes, 'subject'=> $subject]);
    }
}
