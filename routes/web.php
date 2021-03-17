<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Userauth;
use App\Http\Controllers\MemberController;

use App\Http\Controllers\PostController;

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

Auth::routes();
Route::view('login','auth/login')->name('login');
Route::post("user",[Userauth::class,'UserLogin']);
Route::get('crud',[PostController::class,'getPost'])->name('crud');
Route::get('add-post',[PostController::class,'addPost'])->name('post.add');
Route::post('create-post',[PostController::class,'createPost'])->name('post.create');

Route::get('/crud/{id}',[PostController::class,'getPostById']);
Route::view('dashboard','dashboard')->name('dashboard');
Route::view('register','auth/register')->name('register');
Route::get('edit-post/{id}',[PostController::class,'editpost'])->name('edit-post');
// Route::get('/add-post',[PostController::class,'addPost']);


Route::get('delete-post/{id}',[PostController::class,'deletePost'])->name('delete-post');
// Route::get('/edit-post/{id}',[PostController::class,'editPost'])->name('edit-post');
Route::post('/update-post',[PostController::class,'updatePost'])->name('post.update');






Route::get('index', [RoutingController::class,'index'])->name('index');
Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    Route::get('{first}/{second}/{third}', [RoutingController::class,'thirdLevel'])->name('third');
    Route::get('{first}/{second}',[RoutingController::class,'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class,'root'])->name('any');
});
Route::get('/', function () {
    return view('welcome');
});

//Route::view("login",'login');
Route::view("profile",'profile');

// Route::get('/login', function () {
//     if(session()->has('user'))
//     {
//         return redirect('profile');
//     }
//     return view('login');
// });

Route::get('/logout', function () {
    if(session()->has('user'))
    {
        session()->pull('user');
    }
    return redirect('login');
});





Route::get('/', function () {
    return view('welcome');
});

