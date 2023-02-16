<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('user/register', $data);
    }
    
    public function register_action(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:table_users',
            'password'=>'required',
            'password_confirmation'=>'required|same:password',
        ]);
        $user = new User ([
            'name' => $request->name,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('login')->with('success','Registration Success. Please Login!');
    }
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('user/login', $data);
    }
      
    public function login_action(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->route('students.index');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function password()
    {
        $data = [
            'title' => 'Change Password'
        ];
        return view('user/password', $data);
    }
      
    public function password_action(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect()->route('students.index');
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
    public function save_grades(Request $request)
{
    $user_id = auth()->id();
    $grades = [
        'Filipino' => $request->input('filipino_grade'),
        'English' => $request->input('english_grade'),
        'Math' => $request->input('math_grade'),
        'Science' => $request->input('science_grade')
    ];

    DB::table('students')->updateOrInsert(
        ['user_id' => $user_id],
        $grades
    );

    return redirect()->route('students.index')->with('success', 'Grades saved successfully!');
}
}
