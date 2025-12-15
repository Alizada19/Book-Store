<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('frontend.layouts.main');
});*/

Route::get('/', [HomeController::class, 'index']);

//Backend dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Users
Route::resource('users', UserController::class);
// Roles
Route::resource('roles', RoleController::class);
//Permissions
Route::resource('permissions', PermissionController::class);

/*Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});




Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class);

require __DIR__.'/auth.php';
