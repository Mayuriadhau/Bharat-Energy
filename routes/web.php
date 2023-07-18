<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'show'])->name('login-form');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/registration',[UserController::class,'showRegistrationForm'])->name('registration');
Route::post('/registration',[UserController::class,'register']);
Route::get('/dashboard', [UserController::class,'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
// Route::get('/employees/create', [EmployeeController::class,'createEmp']);
Route::get('/create-emp', [EmployeeController::class,'createEmp'])->name('employees.create');
