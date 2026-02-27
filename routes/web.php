<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrderController;

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('frontend.layouts.main');
});*/

Route::get('/', [HomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    //Backend dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Users
    Route::resource('users', UserController::class);
    // Roles
    Route::resource('roles', RoleController::class);
    //Permissions
    Route::resource('permissions', PermissionController::class);
});
/*Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

// Wrap your routes with auth + custom middleware
Route::middleware(['auth', CheckRole::class.':Admin'])->group(function () {
    Route::get('/admin/users/add-role', [UserRoleController::class, 'create'])->name('admin.users.roles.create');
    Route::post('/admin/users/add-role', [UserRoleController::class, 'store'])->name('admin.users.roles.store');
    Route::get('/admin/users', [UserRoleController::class, 'index'])->name('admin.users.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/createUser', [UserController::class, 'createSimpleUser'])->name('users.createSimpleUser');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/edit/{order}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::delete('/orders/{order}', [OrderController::class, 'delete'])->name('orders.delete');
});









Route::resource('books', BookController::class);

Route::resource('categories', CategoryController::class);

require __DIR__.'/auth.php';
