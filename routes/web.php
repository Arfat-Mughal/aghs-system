<?php

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
$HC = HomeController::class;
Route::get('/', [$HC,'home'])->name('home');
Route::get('/contact', [$HC,'contact'])->name('contact');
Route::get('/courses', [$HC,'courses'])->name('courses');
Route::get('/roll_no', [$HC,'roll_no'])->name('roll_no');
Route::get('/result', [$HC,'result'])->name('result');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
