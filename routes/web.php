<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Courses;
use App\Http\Livewire\Users;
use App\Http\Livewire\UserCourses;
use App\Http\Livewire\PlayingVideos;
use App\Http\Livewire\CourseVideos;
use App\Http\Livewire\App;
use App\Http\Livewire\Kelas;
use App\Http\Livewire\TrailerKelas;
use App\Http\Livewire\CourseCheckout;


// app
Route::get('/', App::class)->name('/');
Route::get('/kelas', Kelas::class)->name('kelas');
Route::get('/kelas/{post}', TrailerKelas::class);

// dashboard admin & users
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/playing-videos/{post}/{id?}',PlayingVideos::class);
    Route::get('/checkout/{post}', CourseCheckout::class);
});

// admin rooms
Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/course',Courses::class)->name('course');
    Route::get('/course-videos',CourseVideos::class)->name('course-videos');
    Route::get('/user',Users::class)->name('user');
    Route::get('/access',UserCourses::class)->name('access');
});

