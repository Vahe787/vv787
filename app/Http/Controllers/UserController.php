<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSignInRequest;

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

    public function signIn(UserSignInRequest $request){
    	$validated = $request->validated();

        if(Auth::attempt($validated)){
            return redirect()->route('profile');
        }else{
            return redirect()->route('/login')->with('error', 'Invalid email or password');
        }
    }

    public function signUp(){
        return view('signup');
    }

    public function registr(UserRegisterRequest $request){
        $validated = $request->validated();

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        return redirect()->route('login');
    }

    public function profile(){

        $posts = Post::where('user_id', Auth::user()->id)
        ->with('user')
        ->get();

        return view('profile', [
            'user' => Auth::user(),
            'posts' => $posts
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
