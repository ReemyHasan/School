<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
            "name" => "required|min:3|max:40",
        ]);
        User::create([
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"]),
            "name" => $validated["name"],
        ]);
    }
    public function login()
    {
        // if (empty(Auth::check())) {
        return view("auth.login");
        // }
    }
    public function authenticate(AuthRequest $request)
    {
        //validation - check Role - redirectoin with message
        $validated = $request->validated();
        $remember = !empty($request->remember) ? true : false;


        if (auth()->attempt($validated, $remember)) {
            request()->session()->regenerate();
            if (Auth::user()->role == 1) {
                // dd(Auth::user()->role);
                return redirect()->route("admin.dashboard")->with("success", "LOGGED IN SUCCESSFULLY");
            } else if (Auth::user()->role == 2)
                return redirect()->route("teacher.dashboard")->with("success", "LOGGED IN SUCCESSFULLY");
            else if (Auth::user()->role == 3)
                return redirect()->route("student.dashboard")->with("success", "LOGGED IN SUCCESSFULLY");
            else if (Auth::user()->role == 4)
                return redirect()->route("parent.dashboard")->with("success", "LOGGED IN SUCCESSFULLY");
        }
        return redirect()->back()->with("error", "Error ");
    }
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route("login")->with("success", "LOGGED OUT SUCCESSFULLY");

    }
    public function edit_password()
    {
        return view("auth.change_password");
    }
    public function change_password(Request $request)
    {
        if ( Hash::check($request->get('old_password'),Auth::user()->password)) {
            $validated = $request->validate(
                [
                    "password" => "confirmed|required",
                ]
            );
            if ($validated) {
                User::where("id", Auth::user()->id)->update(['password' => Hash::make($validated['password'])]);
                return redirect()->back()->with('success','password changed successfully');
            }
        } else {
            return back()->with("error", "old password is not correct");
        }
    }
}
