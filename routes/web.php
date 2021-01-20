<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Dashboard;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('home');

// Route::middleware(['auth:sanctum', 'verified', 'admin'])->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
Route::prefix('/dashboard')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/create-assignment', [AssignmentController::class, 'create'])->name('assignment.create');
});
