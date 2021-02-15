<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserSignInRequest;
use Illuminate\Support\Facades\Storage;

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
        User::create($request->validated());

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

    public function edit(){
        return view('user-edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request){

        $validated = $request->validate([
            'name' => 'nullable|min:3|max:16',
            'password' => 'nullable|min:6',
            'image' => 'nullable|image|max:2048',
        ]);
        $validated = array_filter($validated, function($value){
            return !empty($value);
        });
        Auth::user()->update($validated);

        if($request->hasFile('image')){

            if(Auth::user()->profile_image){
                $oldImagePath = Auth::user()->profile_image;

                if(Storage::exists($oldImagePath)){
                    Storage::delete($oldImagePath);
                }
            }

            $imageName = Storage::put('images', $request->file('image'));
            Auth::user()->profile_image = $imageName;
            Auth::user()->save();
        }
        return redirect()->route('profile');
    }

    public function getProfileImage(){
        return response()->file(Storage::path(Auth::user()->profile_image));
    }
}
