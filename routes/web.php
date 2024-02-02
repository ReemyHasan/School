<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(["middleware" => "auth"], function () {


    Route::resource("classes",ClassController::class);
    Route::resource("subjects",SubjectController::class);

    ///-------------Admin------------------
    Route::group(["middleware" => "admin"], function () {

        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name("admin.dashboard");

        Route::resource("users",UserController::class)->except('show');


        Route::resource('students',StudentController::class)->only('index','edit','update');
        Route::resource('admins',AdminController::class)->only('index', 'show');
        Route::resource('teachers',TeacherController::class)->only('index','edit','update');
        Route::get('teachers/{id}/subjects',[TeacherController::class,'subjects'])->name('teachers.subjects.list');
        Route::resource('parents',ParentsController::class)->only('index','edit','update');


        Route::resource("assign_subject",ClassSubjectController::class)->except(["show", "edit","update"]);
        Route::get("assign_subject/{class}/edit",[ClassSubjectController::class,'edit'])->name("assign_subject.class.edit");
        Route::put("assign_subject/{class}/edit",[ClassSubjectController::class, 'update'])->name("assign_subject.class.update");
        Route::put("assign_subject/{assignmet}/activate",[ClassSubjectController::class,"activate"])->name("assign_subject.activate");



    });
    ///-------------teacher------------------
    Route::group(["middleware" => "teacher"], function () {

        Route::get('/teacher/dashboard', [DashboardController::class, 'index'])->name("teacher.dashboard");
        Route::resource('teachers',TeacherController::class)->only('show');
    });

    ///-------------student------------------
    Route::group([''], function () {

        Route::get('/student/dashboard', [DashboardController::class, 'index'])->name("student.dashboard");
        Route::resource('students',StudentController::class)->only('show');

    });

    ///-------------parent------------------
    Route::group(["middleware" => "parent"], function () {

        Route::get('/parent/dashboard', [DashboardController::class, 'index'])->name("parent.dashboard");
        Route::get('/parents/{id}/mystudents', [ParentsController::class, 'mystudents'])->name("parents.mystudents");
        Route::resource('parents',ParentsController::class)->only('show');

    });
});
