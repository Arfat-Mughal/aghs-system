<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\FeeController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\ResultController;
use App\Http\Controllers\admin\SlipController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\GradeController;
use App\Http\Controllers\admin\NoteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use App\Mail\NewStudentAdded;
use Illuminate\Support\Facades\Mail;

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


Route::get('/clear&optimize', function() {
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    return '<h1>All cleared</h1>';
});

$HC = HomeController::class;
Route::get('/', [$HC,'home'])->name('home');
Route::get('/contact', [$HC,'contact'])->name('contact');
Route::post('/contact', [$HC,'contactStore'])->name('contact_store');
Route::get('/courses', [$HC,'courses'])->name('courses');
Route::post('/courses', [$HC,'getCertificate'])->name('get_certificate');
Route::get('/roll_no', [$HC,'roll_no'])->name('roll_no');
Route::get('/roll_no_slip', [$HC,'getRollNumberSlip'])->name('get_roll_no');
Route::get('/result', [$HC,'result'])->name('result');
Route::get('/result_sheet', [$HC,'getMaksSheet'])->name('result_catd');
Route::get('/notice', [$HC,'notice'])->name('notice');
Route::get('/about-us', [$HC,'about'])->name('about');

Route::group(['middleware' => ['auth'],'namespace'=>'admin','prefix'=>'admin'], function() {
    $AC = AdminController::class;
    $SC = StudentController::class;
    $SLC = SlipController::class;
    $RC = ResultController::class;
    $CC = CertificateController::class;
    $NC = NotificationController::class;
    $BC = BannerController::class;
    $FC = FeeController::class;

    //Notes
    Route::get('notes', [NoteController::class,'index'])->name('notes.index');
    Route::post('notes', [NoteController::class,'store'])->name('notes.store');
    Route::delete('notes/{note}', [NoteController::class,'destroy'])->name('notes.destroy');
    Route::put('notes/{note}', [NoteController::class,'update'])->name('notes.update');
    Route::get('note/{id}', [NoteController::class,'view'])->name('notes.view');
    //Grades classes
    Route::get('grades', [GradeController::class,'index'])->name('grades.index');
    Route::post('grades', [GradeController::class,'store'])->name('grades.store');
    Route::put('grades', [GradeController::class,'update'])->name('grades.update');
    Route::post('grade-edit', [GradeController::class,'edit'])->name('grades.edit');

    Route::get('/dashboard',[$AC,'index'])->name('panel');
    Route::get('/certificate-of-merit',[$AC,'certificateMerit'])->name('certificate_merit');
    Route::get('/get-certificate-of-merit',[$AC,'get_certificateMerit'])->name('get_certificate_merit');
    //StudentController
    Route::get('/students',[$SC,'index'])->name('students');
    Route::post('/students',[$SC,'searchStudent'])->name('searchStudent');
    Route::get('/students/{action}/update-all',[$SC,'updateAllStatus'])->name('update_all_students_status');
    Route::get('/student/create',[$SC,'create'])->name('add_student');
    Route::post('/student/create',[$SC,'store'])->name('store_student');
    Route::get('/student/{id}/update',[$SC,'update'])->name('update_student');
    Route::post('/student/update',[$SC,'update_store'])->name('store_update_student');
    Route::post('/student/update/positions',[$SC,'addStudentPositions'])->name('add_student_positions');
    Route::get('/student/{id}/view',[$SC,'view'])->name('view_student');
    Route::post('/student/{id}/delete',[$SC,'destroy'])->name('delete_student');
    Route::get('/student/{id}/class',[$SC,'getStudentsViewByClasses'])->name('getStudentsViewByClasses');
    Route::get('/student/{id}/changeStatus',[$SC,'changeStudentStatus'])->name('change_Student_Status');
    Route::get('/student/changeStatus', [$SC,'ChangeUserStatus'])->name('change_user_status');
    Route::get('/student/{id}/promote-next-class', [$SC,'promoteNextClass'])->name('promote_next_class');
    //SlipController
    Route::get('/slips',[$SLC,'index'])->name('slips');
    Route::get('/slips/create',[$SLC,'create'])->name('add_datesheet');
    Route::post('/slips/create',[$SLC,'store'])->name('store_datesheet');
    Route::post('/slips/{slip_id}/change-slip-status',[$SLC,'changeSlipStatus'])->name('change_slip_status');
    Route::get('/slips/{id}/deleting',[$SLC,'deleteSlip'])->name('delete_slips_marks');
    Route::get('/slips/{id}/update',[$SLC,'updateSlip'])->name('update_slips_marks');
    Route::post('/slips/{id}/update',[$SLC,'update_slip'])->name('update_slips_marks_store');
    Route::get('/slips/{action}/update-all',[$SLC,'updateAllSlipStatus'])->name('update_all_slips_status');
    Route::get('/slips/{grade_id}/print-slip-class-wise',[$SLC,'printSlipClassWise'])->name('print_slip_class_wise');
    //ResultController
    Route::get('/results',[$RC,'index'])->name('results');
    Route::get('/results/create',[$RC,'create'])->name('add_results');
    Route::post('/results/create',[$RC,'store'])->name('store_results');
    Route::get('/results/marks/{grade_id}/adding',[$RC,'addResultMarks'])->name('add_result_marks');
    Route::get('/results/marks/{id}/update',[$RC,'updateResultMarks'])->name('update_result_marks');
    Route::post('/results/marks/{id}/update',[$RC,'storeUpdateResultMarks'])->name('store_update_result_marks');
    Route::post('/results/marks/{grade_id}/adding',[$RC,'storeResultMarks'])->name('store_result_marks');
    Route::get('/results/marks/{grade_id}/deleting',[$RC,'deleteResultMarks'])->name('delete_result_marks');
    Route::get('/results/{id}/changeStatus',[$RC,'changeResultsStatus'])->name('change_result_status');
    Route::get('/results/{action}/update-all-results',[$RC,'updateAllResultsStatus'])->name('update_all_results_status');
    Route::get('/{grade_id}/result-sheet-class-wise', [$RC,'getMaksSheetClassWise'])->name('get_Maks_Sheet_Class_Wise');
    //CertificateController
    Route::get('/certificates',[$CC,'index'])->name('certificates');
    Route::get('/certificate/create',[$CC,'create'])->name('add_certificate');
    Route::post('/certificate/create',[$CC,'store'])->name('store_certificate');
    Route::post('/certificate/changeStatus',[$CC,'changeCertificateStatus'])->name('change_certificate_status');
    Route::get('/certificate/{grade_id}/deleting',[$CC,'destroy'])->name('delete_certificate');
    Route::get('/certificate/{action}/update-all-certificates',[$CC,'updateAllCertificateStatus'])->name('update_all_certificates_status');
    Route::get('/certificate/{id}/view',[$CC,'view'])->name('view_certificate');
    //notifications
    Route::get('/notify',[$NC,'index'])->name('notifications');
    Route::post('/notify',[$NC,'store'])->name('store_notifications');
    Route::get('/notify/{id}/delete',[$NC,'delete'])->name('delete_notifications');
    //banners
    Route::get('/banners',[$BC,'index'])->name('banners');
    Route::post('/banners',[$BC,'store'])->name('store_banners');
    Route::get('/banners/{id}/delete',[$BC,'delete'])->name('delete_banners');
    //fees
    Route::get('/fees',[$FC,'index'])->name('fees');
    Route::post('/fees',[$FC,'store'])->name('fee_store');
    Route::get('/fees/create',[$FC,'create'])->name('add_fee');
    Route::get('/fee/{id}/view}',[$FC,'view'])->name('view_fee');
    Route::get('/fee/{id}/all/classes}',[$FC,'all_fee_view'])->name('all_fee_view');
    Route::post('/fee/delete-by-id}',[$FC,'destroyFee'])->name('view_delete');
    Route::get('/fees/all/delete}',[$FC,'delete_all_fee_cards'])->name('delete_all_fee_cards');
    Route::get('/fees/delete/{id}/class-id}',[$FC,'delete_fee_cards_by_class_id'])->name('delete_fee_cards_by_class_id');
    Route::get('/fee/{id}/update}',[$FC,'update_fee_card'])->name('update_fee_card');
    Route::post('/fee/update}',[$FC,'fee_update'])->name('fee_update');
    Route::get('/fee/{class_id}/update-class}',[$FC,'update_fee_by_class'])->name('update_fee_by_class');
    Route::post('/fee/update/by-class}',[$FC,'fee_update_for_selected_class'])->name('fee_update_for_selected_class');
});
//Route::get('/dashboard', function () {
//    return view('admin.panel');
//})->middleware(['auth'])->name('dashboard');

Route::get('/send-welcome-email/{user}', function () {
    // Fetch the user by ID (or any other appropriate method based on your application)
    $user = App\Models\Student::find(1);

    // Check if the user exists
    if (!$user) {
        return response('User not found.', 404);
    }

    // Send the welcome email
    Mail::to($user->email)->send(new NewStudentAdded($user));

    return response('Welcome email sent to ' . $user->email);
});

require __DIR__.'/auth.php';
