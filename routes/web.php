<?php

use App\Http\Controllers\AdminController;
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
Route::get('/student_dashboard',[StudentController::class, 'dashboard'])->name('student.dashboard');
Route::get('/logout',[StudentController::class, 'logout']);
Route::get('/apply_hostel',[StudentController::class, 'hostelForm']);
Route::post('/apply_hostel',[StudentController::class, 'apply'])->name('student.apply');


Route::get('/admin/',[AdminController::class, 'index'])->name('admin.login');
Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/admin_dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/manage_rooms',[AdminController::class, 'viewRooms']);
Route::get('/admin/manage_rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('admin.editRoom');
Route::get('/admin/create_room', [AdminController::class, 'createRoom'])->name('admin.createRoom');
Route::post('/admin/create_room', [AdminController::class, 'write'])->name('admin.saveRoom');
Route::put('/admin/manage_rooms/{room}/update', [AdminController::class, 'updateRoom'])->name('admin.updateRoom');
Route::delete('/admin/manage_rooms/{room}/delete', [AdminController::class, 'deleteRoom'])->name('admin.deleteRoom');
Route::get('/admin/manage_applications',[AdminController::class, 'getApplications'])->name('admin.manageApplications');
