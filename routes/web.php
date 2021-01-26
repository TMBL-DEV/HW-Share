<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;
use App\Models\Assignment;
use App\Models\AssignmentState;
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
Route::get('/assignment/{id}', [AssignmentController::class, 'show'])->middleware(['auth:sanctum', 'verified'])->name('assignment');
Route::post('/assignment/{id}/status/{state}', [AssignmentState::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('assignmentState.store');

Route::prefix('/dashboard')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/create-assignment', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::post('/store-assignment', [AssignmentController::class, 'store'])->name("assignment.store");
    Route::post('admin/user/{id}', [Dashboard::class, 'rights'])->name("admin.rights");
});
