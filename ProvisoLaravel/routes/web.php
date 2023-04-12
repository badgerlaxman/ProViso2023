<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\GraphController;

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
Route::post('addCareer',[AuthController::class, 'addCareer'])->name('addCareer');
Route::post('post-career', [AuthController::class, 'postCareer'])->name('career.post');
Route::post('addCompany',[AuthController::class, 'addCompany'])->name('addCompany');
Route::post('post-company', [AuthController::class, 'postCompany'])->name('company.post');
Route::post('addSkill',[AuthController::class, 'addSkill'])->name('addSkill');
Route::post('post-skill', [AuthController::class, 'postSkill'])->name('skills.post');
Route::post('profile', [AuthController::class,'profile'])->name('profile');
Route::post('postProfile', [AuthController::class, 'postProfile'])->name('postProfile');
Route::get('newCompany', [AuthController::class, 'newCompany'])->name('newCompany');
Route::post('postNewCompany', [AuthController::class, 'postNewCompany'])->name('postNewCompany');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('print-classes', [GraphController::class, 'print_classes'])->name('print.classes');
Route::get('basic-graph', [GraphController::class, 'basic_graph'])->name('basic.graph');
Route::get('print-recommendations', [GraphController::class, 'print_recommendations'])->name('print.recommendations');
Route::get('print-skills', [GraphController::class, 'print_skills'])->name('print.skills');
Route::get('print-all-skills', [GraphController::class, 'print_all_skills'])->name('print.all.skills');
Route::get('print-classes-and-skills', [GraphController::class, 'print_classes_and_skills'])->name('print.classes.and.skills');
Route::get('create-class-graph', [GraphController::class, 'create_class_graphgraph'])->name('create.class.graph');
Route::get('create-skill-graph', [GraphController::class, 'create_skill_graph'])->name('create.skill.graph');
Route::get('update-student', [GraphController::class, 'update_student'])->name('update.student');