<?php

use App\Models\Student;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StudentController::class,'index'])->name('student.index');
Route::get('/register', [StudentController::class,'register'])->name('student.register');
Route::post('/register',[StudentController::class, 'write'])->name('student.write');
Route::post('/', [StudentController::class,'login'])->name('student.login');
Route::get('/student_dashboard',[StudentController::class, 'dashboard']);
Route::get('/logout',[StudentController::class, 'logout']);
