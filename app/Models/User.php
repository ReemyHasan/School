<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'role'
    // ];

    protected $guarded = [
        "id", "created_at", "updated_at"];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    static public function scopeRole($query, $role)
    {
        return $query->where('role', intval($role));
    }
    public function class(){
        return $this->belongsTo(ClassRoom::class,'class_id');
    }
    static public function getRecords()
    {
        $users = User::orderBy("created_at","desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail')!=null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('searchRole')!=null) {
            $users = $users->where('role', intval(request()->get('searchRole')));
        }
        if (request()->get('date')!=null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getStudentsRecords()
    {
        $users = User::where('role',3)->orderBy("created_at","desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail')!=null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('date')!=null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getAdminsRecords()
    {
        $users = User::where('role',1)->orderBy("created_at","desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail')!=null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('date')!=null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getTeachersRecords()
    {
        $users = User::where('role',2)->orderBy("created_at","desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail')!=null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('date')!=null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getParentsRecords()
    {
        $users = User::where('role',4)->orderBy("created_at","desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail')!=null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('date')!=null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }

    public function get_imageUrl(){
        if($this->image)
        {
            return url('storage/'. $this->image);
        }
    }
}
