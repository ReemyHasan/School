<?php

namespace App\Http\Controllers;

use App\Models\classRoom;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassRoom::orderBy("created_at","desc");
        if(request()->has("Search")){
        $classes = $classes->search(request("Search",""));
        }
        if(request()->has("date")){
            $classes = $classes->search(request("date",""));
            }
        return view("class.list", ['classes' => $classes->paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create');
        if(auth()->user()->cannot('classes.create'))
            abort(401);
        return view("class.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(auth()->user()->cannot('classes.create'))
            abort(401);
        $validated = $request->validate([
            "name"=> "min:3|max:255|unique:class_rooms|required",
        ]);
        $validated['created_by'] = Auth::user()->id;
        $validated['status'] = intval($request->status);
        classRoom::create($validated);
        return redirect()->route("classes.index")->with('success', 'Class Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = classRoom::find($id);
        $subjects = $class->subjects;
        $students = $class->class_students;
        return view('class.show', ['class' => $class, 'subjects'=> $subjects, 'students'=> $students]);
    }

    public function edit(string $id)
    {
        $class = classRoom::find($id);
        $this->authorize('update',$class);
        // dd($class->id);
        return view('class.edit', ['class' => $class]);
    }

    public function update(Request $request, string $id)
    {
        $class = classRoom::find($id);
        $this->authorize('update',$class);
        $validated = $request->validate(
            [
                "name" => "max:225|min:5|unique:class_rooms,name,".$id
            ]
        );
        $validated['created_by'] = Auth::user()->id;
        $validated['status'] = intval($request->status);
        // dd($validated);
        $class->update($validated);
        return redirect()->route("classes.index")->with('success', 'Class updated Successfully');

    }

    public function destroy(string $id)
    {
        $this->authorize('delete');
        $class = classRoom::find($id);
        $class->delete();
        return redirect()->route("classes.index")->with('success', 'Class deleted Successfully');
    }
    public function students($id){
        $class = classRoom::find($id);
        $students = $class->class_students;
        return view('class.students', ['class'=> $class,'students'=> $students]);
    }
}
