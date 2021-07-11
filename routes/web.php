<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('profile.show');
})->name('profile');


Route::middleware(['auth:sanctum', 'verified'])->resource('/dosen', DosenController::class, [
    'names' => [
        'index' => 'dosen',
        'create' => 'dosen.create',
        'store' => 'dosen.store',
        'edit' => 'dosen.edit',
        'update' => 'dosen.update',
        'destroy' => 'dosen.destroy',
    ]
]);

Route::middleware(['auth:sanctum', 'verified'])->resource('/staff', StaffController::class, [
    'names' => [
        'index' => 'staff',
        'create' => 'staff.create',
        'store' => 'staff.store',
        'edit' => 'staff.edit',
        'update' => 'staff.update',
        'destroy' => 'staff.destroy',
    ]
]);

Route::middleware(['auth:sanctum', 'verified'])->resource('/student', StudentController::class, [
    'names' => [
        'index' => 'student',
        'create' => 'student.create',
        'store' => 'student.store',
        'edit' => 'student.edit',
        'update' => 'student.update',
        'destroy' => 'student.destroy',
    ]
]);
