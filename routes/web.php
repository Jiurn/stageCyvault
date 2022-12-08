<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomLoginController;

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

    $test = DB::table('test')->get();

    $users = DB::table('users')->get();

    return view('welcome', ['test' => $test, 'users'=> $users]);
});

Auth::routes();

Route::get('/welcome', function () {

    $test = DB::table('test')->get();

    $users = DB::table('users')->get();

    return view('welcome', ['test' => $test, 'users'=> $users]);
});

Auth::routes();


Route::controller(CustomLoginController::class)->group(function(){

    Route::get('/login', '/login')->name('login');

    Route::get('/home', 'login')->name('home');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_login', 'validate_login')->name('customlogincontroller.validate_login');
});

Auth::routes();
