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
    public function class ()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
