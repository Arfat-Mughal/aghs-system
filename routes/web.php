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
Route::get('/roll_no_slip', [$HC,'getRollNumberSlip'])->name('get_roll_no');
Route::get('/result', [$HC,'result'])->name('result');
Route::get('/result_sheet', [$HC,'getMaksSheet'])->name('result_catd');

Route::group(['middleware' => ['auth'], 'namespace'=>'admin'], function() {
    $AC = AdminController::class;
    $SC = StudentController::class;
    $SLC = SlipController::class;
    $RC = ResultController::class;
    Route::get('/dashboard',[$AC,'index'])->name('panel');
    Route::get('/certificate-of-merit',[$AC,'certificateMerit'])->name('certificate_merit');
    Route::get('/get-certificate-of-merit',[$AC,'get_certificateMerit'])->name('get_certificate_merit');
    //StudentController
    Route::get('/students',[$SC,'index'])->name('students');
    Route::get('/student/create',[$SC,'create'])->name('add_student');
    Route::post('/student/create',[$SC,'store'])->name('store_student');
    Route::get('/student/{id}/update',[$SC,'update'])->name('update_student');
    Route::post('/student/update',[$SC,'update_store'])->name('store_update_student');
    Route::get('/student/{id}/view',[$SC,'view'])->name('view_student');
    Route::post('/student/{id}/delete',[$SC,'destroy'])->name('delete_student');
    Route::get('/student/{id}/class',[$SC,'getStudentsViewByClasses'])->name('getStudentsViewByClasses');
    //SlipController
    Route::get('/slips',[$SLC,'index'])->name('slips');
    Route::get('/slips/create',[$SLC,'create'])->name('add_datesheet');
    Route::post('/slips/create',[$SLC,'store'])->name('store_datesheet');
    Route::post('/slips/{slip_id}/change-slip-status',[$SLC,'changeSlipStatus'])->name('change_slip_status');
    //ResultController
    Route::get('/results',[$RC,'index'])->name('results');
    Route::get('/results/create',[$RC,'create'])->name('add_results');
    Route::post('/results/create',[$RC,'store'])->name('store_results');
    Route::get('/results/marks/{grade_id}/adding',[$RC,'addResultMarks'])->name('add_result_marks');
    Route::post('/results/marks/{grade_id}/adding',[$RC,'storeResultMarks'])->name('store_result_marks');
});
//Route::get('/dashboard', function () {
//    return view('admin.panel');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
