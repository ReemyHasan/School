<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Timetable extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "class_timetable";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[
        "id",
    ];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function class ()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public static function scopeRow ($query,$values){
        return $query->where('class_id', $values['class_id'])
        ->where('subject_id', $values['subject_id'])
        ->where('day_id', $values['day_id'])
        ->where('start_time', $values['start_time'])
        ;

    }
}
