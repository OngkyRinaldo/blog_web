<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\cms\CategoryController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\PostController;
use App\Http\Controllers\cms\TagController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'category' => CategoryController::class,
        'tag' => TagController::class,
        'post' => PostController::class,

    ]);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->middleware(['checkRole:admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'admin'])->name('admin');
        Route::get('/users', [DashboardController::class, 'user'])->name('admin.user');
        Route::delete('/users/{user}', [DashboardController::class, 'deleteUser'])->name('admin.deleteUser');
        Route::get('/categories', [DashboardController::class, 'category'])->name('admin.category');
        Route::get('/tags', [DashboardController::class, 'tag'])->name('admin.tag');
    });
});



require __DIR__ . '/auth.php';
