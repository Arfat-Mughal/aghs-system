<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\SlipController;
use App\Http\Controllers\admin\StudentController;
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

Route::group(['middleware' => ['auth'], 'namespace'=>'admin'], function() {
    $AC = AdminController::class;
    $SC = StudentController::class;
    $SLC = SlipController::class;
    $RC = ResultController::class;
    Route::get('/dashboard',[$AC,'index'])->name('panel');
    Route::get('/students',[$SC,'index'])->name('students');
    Route::get('/student/add',[$SC,'create'])->name('add_student');
    Route::post('/student/add',[$SC,'store'])->name('store_student');
    Route::get('/slips',[$SLC,'index'])->name('slips');
    Route::get('/results',[$RC,'index'])->name('results');
});
//Route::get('/dashboard', function () {
//    return view('admin.panel');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
