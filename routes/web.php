<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Livewire\Courses;
use App\Http\Livewire\Users;
use App\Http\Livewire\UserCourses;

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

Route::get('/', [AppController::class, 'index']);
Route::get('/kelas', [ClassController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    // Route::get('/course',[CourseController::class,'index'])->name('course');
    Route::get('/course',Courses::class)->name('course');
    Route::get('/user',Users::class)->name('user');
    Route::get('/access',UserCourses::class)->name('access');
});
