<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ClassSubject extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "class_subject";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "class_id",
        "subject_id",
        "assigned_by"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
    public function class ()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function scopeSearch($query, $search)
    {
        $query
        ->where('created_at', 'LIKE', '%' . $search . '%');
        // ->orWhere('class_rooms.name', 'LIKE', '%' . $search . '%')
        // ->orWhere('subjects.name', 'LIKE', '%' . $search . '%');

    }
}
