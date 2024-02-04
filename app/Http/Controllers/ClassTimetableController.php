<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Timetable;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClassTimetableController extends Controller
{
    public function index()
    {
        //
    }

    public function create(string $id)
    {
        $editing = 0;
        $class = ClassRoom::find($id);
        $subjects = $class->subjects;
        if (!empty(request("subject_id"))) {
            $editing = 1;
            $timetable = $class->mySubjectstimetable->where("subject_id", '<>', request("subject_id"))->toArray();
            // dd($timetable);
            $timetable_subject = $class->mySubjectstimetable->where("subject_id", request("subject_id"))->toArray();
            // dd($timetable);
            $checked = array();
            $disabled = array();
            foreach ($timetable as $time) {
                array_push($disabled, $time["day_name"] . ":" . $time["start_time"]);
            }
            // dd($disabled);
            foreach ($timetable_subject as $time) {
                array_push($checked, $time["day_name"] . ":" . $time["start_time"]);
            }
            // dd($checked);
            return view("timetable.create", [
                'class' => $class,
                'subjects' => $subjects,
                "disabled" => $disabled,
                "checked" => $checked,
                "editing" => $editing,
                "subject_id" => request("subject_id")
            ]);
        }
        return view("timetable.create", ['class' => $class, 'subjects' => $subjects, "editing" => $editing]);
    }

    public function store(Request $request, $id)
    {
        $week['sunday'] = 1;
        $week['monday'] = 2;
        $week['tuesday'] = 3;
        $week['wednesday'] = 4;
        $week['thursday'] = 5;

        $class = ClassRoom::find($id);
        $values['class_id'] = $id;
        $subject_id = $request->subject_id;
        $values['subject_id'] = $subject_id;
        $items = $request->except("_token", "subject_id");
        $timetable_subject = $class->mySubjectstimetable->where("subject_id", $values['subject_id'])->toArray();
        // dd($timetable_subject);
        foreach ($timetable_subject as $key => $value) {
            // dd($key, $value);
            foreach ($value as $value1) {
                // dd(isset($items[$value['day_name']]), in_array($value['start_time'], $items[$value['day_name']] ));
                if (
                    !isset($items[$value['day_name']]) ||
                    !in_array($value['start_time'], $items[$value['day_name']])
                ) {
                    $c = Timetable::find($value['id']);
                    $c->delete();
                }
            }
        }
        $i = 0;
        foreach ($items as $key => $value) {
            $values['day_id'] = $week[$key];
            foreach ($value as $key1 => $value1) {
                $values['start_time'] = $value1;
                $c = Timetable::row($values);
                if (!$c->exists())
                    Timetable::create($values);
            }
            $i++;
        }

        return redirect()->route('timetables.show', $id);
    }

    public function show(string $id)
    {
        $class = ClassRoom::find($id);
        $timetable = $class->mySubjectstimetable;
        $week = [];
        $sunday = $timetable->where("day_id", 1)->toArray();
        $week[1] = $sunday;
        $monday = $timetable->where("day_id", 2)->toArray();
        $week[2] = $monday;
        $tuesday = $timetable->where("day_id", 3)->toArray();
        $week[3] = $tuesday;
        $wednesday = $timetable->where("day_id", 4)->toArray();
        $week[4] = $wednesday;
        $thursday = $timetable->where("day_id", 5)->toArray();
        $week[5] = $thursday;
        // dd($week,$timetable->toArray());
        // dd($week);
        return view("timetable.show", ['class' => $class, 'week' => $week]);
    }
    public function destroy(string $id)
    {
        //
    }
}
