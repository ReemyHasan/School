<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Subject extends Model
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
    // protected $with = ['user','comments.user'];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function classes(){
        return $this->belongsToMany(ClassRoom::class,'class_subject')->withTimestamps();
    }
    public function scopeSearch($query, $search){
        $query->where('name','LIKE','%'. $search .'%')
        ->orWhere('type','LIKE','%'. $search .'%')
        ->orWhere('created_at','LIKE','%'. $search .'%');
    }
}
