<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
    	return view('login');
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
    	dd($request->all());
    }

    public function signUp(){
        return view('signup');
    }

    public function registr(Request $request){
        $data = ($request->only(['name', 'email', 'age', 'password']));

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        return redirect('/login');
    }
}
