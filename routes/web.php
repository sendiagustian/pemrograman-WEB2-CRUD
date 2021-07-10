<?php

use App\Http\Controllers\DosenController;
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

Route::resource('/dosen', DosenController::class, [
    'names' => [
        'index' => 'dosen',
        'create' => 'dosen.create',
        'store' => 'dosen.store',
        'edit' => 'dosen.edit',
        'update' => 'dosen.update',
        'delete' => 'dosen.delete',
    ]
]);

Route::get('/staff', function () {
    return view('staff.show');
})->name('staff');

Route::get('/student', function () {
    return view('student.show');
})->name('student');
