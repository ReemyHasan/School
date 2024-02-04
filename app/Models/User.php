<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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
        "id",
        "created_at",
        "updated_at"
    ];
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
    //for student
    public function class ()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    //for teacher
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }
    //for teacher
    public function mySubjectstimetable(){
        return $this->hasMany(Subject::class, 'teacher_id')
        ->join('class_timetable','subjects.id','=','class_timetable.subject_id')
        ->join('class_rooms','class_timetable.class_id','=','class_rooms.id')
        ->join('week','week.id','=','class_timetable.day_id')
        ->select("class_timetable.id",
            "subjects.id as subject_id","subjects.name as subject_name",
            // "class_id",
            "class_rooms.name as class_name",
            "week.id as day_id", "week.name as day_name"
        ,"start_time")
        ->orderBy("week.id","asc")
        ->orderBy("start_time","asc");
    }
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
    // for parent
    public function myStudent()
    {
        return $this->hasMany(User::class, 'parent_id');
    }
    public function teacher_classes_students()
    {
        $users = $this->hasMany(Subject::class, 'teacher_id')
            ->join('class_subject', 'class_subject.subject_id', '=', 'subjects.id')
            ->join('class_rooms', 'class_subject.class_id', '=', 'class_rooms.id')
            ->join('users', 'users.class_id', '=', 'class_rooms.id')
            ->select(
                "class_rooms.name as class_name",
                "class_rooms.id as class_id",
                "subjects.id as subject_id",
                "subjects.name as subject_name",
                'users.*'
            );
            if(request()->get('nameAndEmail') != null){
                $users = $users->where(function ($query) {
                    $query->where('users.name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                        ->orWhere('users.email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
                });
            }
            return $users;
    }
    static public function getRecords()
    {
        $users = User::orderBy("created_at", "desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail') != null) {
            $users = $users->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
        }
        if (request()->get('searchRole') != null) {
            $users = $users->where('role', intval(request()->get('searchRole')));
        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getStudentsRecords()
    {
        $users = User::where('role', 3)->orderBy("created_at", "desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail') != null) {
            $users = User::where(function ($query) {
                $query->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                    ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
            })->where('role', 3);

        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getAdminsRecords()
    {
        $users = User::where('role', 1)->orderBy("created_at", "desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail') != null) {
            $users = User::where(function ($query) {
                $query->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                    ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
            })->where('role', 1);

        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getTeachersRecords()
    {
        $users = User::where('role', 2)->orderBy("created_at", "desc");
        // dd(request()->get('nameAndEmail'));
        if (request()->get('nameAndEmail') != null) {
            $users = User::where(function ($query) {
                $query->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                    ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
            })->where('role', 2);
        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }
    static public function getParentsRecords()
    {
        $users = User::where('role', 4)->orderBy("created_at", "desc");
        // dd($users);
        if (request()->get('nameAndEmail') != null) {
            $users = User::where(function ($query) {
                $query->where('name', 'LIKE', '%' . request()->get('nameAndEmail') . '%')
                    ->orWhere('email', 'LIKE', '%' . request()->get('nameAndEmail') . '%');
            })->where('role', 4);
        }
        if (request()->get('date') != null) {
            $users = $users->where('created_at', 'LIKE', '%' . request()->get('date') . '%');
        }
        return $users;
    }

    public function get_imageUrl()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }
    }
}
