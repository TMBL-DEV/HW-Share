<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;
use App\Models\Assignment;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::prefix('/dashboard')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/create-assignment', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::post('/store-assignment', [AssignmentController::class, 'store'])->name("assignment.store");
    Route::post('admin/user/{id}', [Dashboard::class, 'rights'])->name("admin.rights");
});
