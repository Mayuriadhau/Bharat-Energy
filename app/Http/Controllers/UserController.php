<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show(){
        return view ('login-form');
    }

    public function login(Request $request)
    {
        $form = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth()->attempt($credentials)) {
            return redirect('dashboard')->with('success','You have Successfully loggedin');
        }
        return redirect("/dashboard")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    
    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        // dd($request);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // dd($request);

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ]);
        // dd($request);
        return redirect('dashboard')->with('success', 'Registration successful. You can now log in.');
    }

    public function dashboard()
    {
        if (Auth()->check()) {
            $department = Department::all();
            return view('dashboard',compact('department'));
        }

        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
