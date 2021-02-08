<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
    	if(Auth::check()){
            return redirect()->route('profile');
        } else {
            return view('login');
        }
    }

    public function index(){

    	$arr =[
         [
    		'name' => 'Vahe',
    		'age' => 21
    	],
    	[
    		'name' => 'Davit',
    		'age' => 23
    	]];

    	return view('welcome', [
    		'users' => $arr
    	]);
    }

    public function signIn(Request $request){
    	$validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated)){
            return redirect()->route('profile');
        }else{
            return redirect()->route('/login')->with('error', 'Invalid email or password');
        }
    }

    public function signUp(){
        return view('signup');
    }

    public function registr(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:16',
            'email' => 'required|unique:users,email',
            'age' => 'required|numeric|max:100',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        return redirect()->route('login');
    }

    public function profile(){
        return view('profile', [
            'user' => Auth::user()
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
