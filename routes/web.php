<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
Route::get('/login', [CustomAuthController::class,'login'])->middleware('alreadylogin');
Route::get('/registration', [CustomAuthController::class,'registration'])->middleware('alreadylogin');
Route::post('/registerUser', [CustomAuthController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser', [CustomAuthController::class,'loginUser'])->name('loginUser');
Route::get('/dashboard', [CustomAuthController::class,'dashboard'])->middleware('islogedin');
Route::get('/logout', [CustomAuthController::class,'logout']);