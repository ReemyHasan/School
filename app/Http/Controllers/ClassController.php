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
        return view("class.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $subjects = $class->subjects()->orderBy('created_at','desc');
        return view('class.show', ['class' => $class, 'subjects'=> $subjects]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = classRoom::find($id);
        // dd($class->id);
        return view('class.edit', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $class = classRoom::find($id);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = classRoom::find($id);
        $class->delete();
        return redirect()->route("classes.index")->with('success', 'Class deleted Successfully');
    }
}