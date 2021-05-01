<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AssignmentStateController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
//Route::get('/assignment/{id}', [AssignmentController::class, 'show'])->middleware(['auth:sanctum', 'verified'])->name('assignment');

Route::post('/assignment/{id}/status/{state}', [AssignmentStateController::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('assignmentState.store');

Route::resource('assignment', AssignmentController::class)->except([
    'destroy', 'index'
]);

Route::name('dashboard')->prefix('/dashboard')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/', [Dashboard::class, 'index']);
    Route::post('admin/user/{id}', [Dashboard::class, 'rights'])->name("admin.rights");
});

Route::prefix('/manage')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/assignments', [Dashboard::class, 'assignments'])->name('manage.assignments');
    Route::get('/users')->name('manage.users');
});
