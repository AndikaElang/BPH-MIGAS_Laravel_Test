<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\lecturerController;

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
    return view('welcome');
});

// Route::get('/students', [studentController::class, 'list']);

Route::resource('/students', studentController::class);

Route::resource('/admins', adminController::class);
Route::get('/admins/accept/{admin}', [adminController::class, 'accept']);
Route::get('/admins/decline/{admin}', [adminController::class, 'decline']);

Route::resource('/lecturers', lecturerController::class);

