<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Exam extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'created_at',
        'updated_at',
        'id',
    ];

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
    static public function getRecords()
    {
        $exams = Exam::orderBy("created_at", "desc");
        if (request()->get('exam_name') != null) {
            $exams = $exams->where('name', 'LIKE', '%' . request()->get('exam_name') . '%');

        }
        if (request()->get('subject_id') != null) {
            $exams = $exams->where('subject_id', 'LIKE', '%' . request()->get('subject_id') . '%');

        }
        if (request()->get('date') != null) {
            $exams = $exams->where('date', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $exams;
    }
}
