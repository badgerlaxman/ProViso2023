<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return view('index');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
Route::post('post-dashboard', [AuthController::class, 'postDashboard'])->name('dashboard.post'); 
Route::get('index', [AuthController::class, 'index'])->name('home');
Route::get('profile', [AuthController::class, 'profile'])->name('profile');
Route::post('addClass',[AuthController::class, 'addClass'])->name('addClass');
Route::post('addMinor',[AuthController::class, 'addMinor'])->name('addMinor');
Route::post('post-minor', [AuthController::class, 'postMinor'])->name('minor.post');
Route::post('addCompany',[AuthController::class, 'addCompany'])->name('addCompany');
Route::post('post-company', [AuthController::class, 'postCompany'])->name('company.post');
Route::post('addSkill',[AuthController::class, 'addSkill'])->name('addSkill');
Route::post('post-skill', [AuthController::class, 'postSkill'])->name('skills.post');
Route::post('profile', [AuthController::class,'profile'])->name('profile');
Route::post('postProfile', [AuthController::class, 'postProfile'])->name('postProfile');
Route::get('newCompany', [AuthController::class, 'newCompany'])->name('newCompany');
Route::post('postNewCompany', [AuthController::class, 'postNewCompany'])->name('postNewCompany');