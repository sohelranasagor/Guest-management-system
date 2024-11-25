<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MessegeController;
use App\Http\Controllers\Backend\PermissionController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('messeges', MessegeController::class);
Route::get('/messege',[ MessegeController::class, 'view'])->name('messege');
Route::post('/messege',[ MessegeController::class, 'save'])->name('messege');
Route::get('/messegeRead/{id}',[ MessegeController::class, 'marsAsRead'])->name('marsAsRead');
