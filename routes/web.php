<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function(){

// 	$a = 6;
// 	$b = 4;
// 	$c = $a+$b;

// 	return view('login',[
// 		'c' => $c
// 	]);
// });

// Route::get('/login', function(){
// 	return view('login');
// });
Route::get('/', [UserController::class, 'index']);


Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'signIn'])->name('post-login');

Route::get('/signup', [UserController::class, 'signUp'])->name('signup');

Route::post('/registr', [UserController::class, 'registr']);

Route::group(['middleware' => ['checkUserAuth']],function(){

	Route::get('me/edit', [UserController::class, 'edit'])->name('user.edit');

	Route::post('me/edit', [UserController::class, 'update'])->name('user.update');

	Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('checkUserAuth');

	Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('checkUserAuth');

	Route::get('/posts', [PostController::class, 'create'])->name('post-create')->middleware('checkUserAuth');

	Route::post('/posts', [PostController::class, 'store'])->name('store-posts')->middleware('checkUserAuth');

	Route::get('me/profile-image', [UserController::class, 'getProfileImage'])->name('user.profile-image');
});




use App\Models\User;
Route::get('/test', function(){
	// $users = User::get();
	// dd($users);

	// foreach ($users as $user) {
	// 	dump($user->email);
	// }


	// $user = User::first();
	// dump($user->email);

	// $users = User::where('age', 21)->first();
	// dump($users->name);

	// $users = User::where('age', 21)->select(['email'])->get();
	// dump($users);


	// $users = User::where('age', 21)->get();
	// dump($users);

	// $user = User::orderBy('age', 'desc')->get();
	// $user = User::orderBy('age', 'asc')->get();
	// dump($user);

	// $user = User::limit(10)->offset(5)->get();
	// $user = User::take(10)->skip(5)->get();
	// dump($user);

	// $user = User::groupBy('name')->get();
	// dd($user);

	// $count = User::count();
	// $count = User::where('age', '>', 10)->count();
	// dump($count);

	// $user = User::where('id', 4)->first();
	// $user = User::find(4);
	// dump($user);

	$user = User::whereAge(21)->first();
	dd($user);


});

// Route::get('user/{id}', function($id){
// 	dd($id);
// });

//hello

//hi everyone
//hi jhone

