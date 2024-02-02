<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ClassRoom extends Model
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

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function class_students(){
        $users = $this->hasMany(User::class,'class_id');
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail') != null) {
            $users = $users->where(function ($query) {
                $query->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                    ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
            });

        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class,'class_subject','class_id')->withTimestamps();
    }
    public function scopeSearch($query, $search){
        $query->where('name','LIKE','%'. $search .'%')
        ->orWhere('created_at','LIKE','%'. $search .'%');
    }
}
