<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DateController;
use App\Http\Controllers\Admin\DetectionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Comment;
use App\Models\Date;
use App\Models\Service;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware'=>'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Admin Part
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Admin routes
        Route::resource('admins', 'Admin\AdminController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('users', 'Admin\UserController');
        Route::resource('doctors','Admin\DoctorController');
        Route::resource('specialtys','Admin\SpecialtyController');
        Route::resource('expenses','Admin\ExpenseController');
        Route::resource('offers','Admin\OfferController');
        Route::resource('services','Admin\ServiceController');
        Route::post('services/store/{id}',[ServiceController::class,'store'])->name('service.store');
        Route::post('services/update/{id}','Admin\ServiceController@update')->name('service.update');
        Route::delete('services/destroy/{id}','Admin\ServiceController@destroy')->name('service.destroy');
        Route::resource('dates','Admin\DateController');
        Route::post('dates/store/{id}',[DateController::class,'store'])->name('dates.store');
        Route::resource('prices','Admin\PriceController');
        Route::post('prices/update/{id}','Admin\PriceController@update')->name('prices.update');
        Route::resource('bills','Admin\BillController');
        Route::post('bills/store',[BillController::class,'store'])->name('bill.store');
        Route::resource('files','Admin\FileController');
        
        Route::resource('comments','Admin\CommentController');
        Route::post('comments/store/{id}',[CommentController::class,'store'])->name('comments.store');
        Route::resource('rewards','Admin\RewardController');
        Route::post('rewards/store/{id}',[RewardController::class,'store']);
        Route::post('rewards/update/{reward_points}',[RewardController::class,'update'])->name('update');
        Route::resource('settings', 'Admin\SettingController');
    });
    Route::group(['namespace'=>'Admin' , 'prefix'=>'admin'],function(){
        Route::get('detections/open',[DetectionController::class,'detection_open'])->name('detection_open');
        Route::get('detections/pending',[DetectionController::class,'detection_pending'])->name('detection_pending');
        Route::get('detections/inprogress',[DetectionController::class,'detection_inprogress'])->name('detection_inprogress');
        Route::get('detections/complete',[DetectionController::class,'detection_complete'])->name('detection_complete');
        Route::get('detections/cancelled',[DetectionController::class,'detection_cancelled'])->name('detection_cancelled');
        Route::get('detection_pendingEd/{id}',[DetectionController::class,'detection_pendingEd'])->name('detection_pendingEd');
        Route::get('detection_inprogressEd/{id}',[DetectionController::class,'detection_inprogressEd'])->name('detection_inprogressEd');
        Route::get('detection_completeEd/{id}',[DetectionController::class,'detection_completeEd'])->name('detection_completeEd');
        Route::get('detection_cancelledEd/{id}',[DetectionController::class,'detection_cancelledEd'])->name('detection_cancelledEd');
        Route::get('detections/doctor_ajax/{id}',[DetectionController::class,'doctor_ajax'])->name('doctor_ajax');
        Route::get('detections/date_ajax/{id}',[DetectionController::class,'date_ajax'])->name('date_ajax');
        Route::get('detections/price_ajax/{id}',[DetectionController::class,'price_ajax'])->name('price_ajax');
        Route::get('detections/detection_ajax/{id}',[DetectionController::class,'detection_ajax'])->name('detection_ajax');
        Route::post('detections/store',[DetectionController::class,'store'])->name('store');
        Route::post('detection_update/{id}',[DetectionController::class,'detection_update'])->name('detection_update');
        Route::delete('detection_destroy/{id}',[DetectionController::class,'destroy'])->name('destroy');
        Route::get('detections/show/{id}',[DetectionController::class,'show'])->name('detection.show');
    });
Route::group(['namespace'=>'Admin' , 'prefix'=>'admin'],function(){
    Route::get('treasury',[ReportController::class,'treasury'])->name('treasury');
    Route::get('dates',[ReportController::class,'dates'])->name('dates');
   
});

Route::group(['namespace'=>'Admin' , 'prefix'=>'admin'],function(){
Route::get('autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
});
    // Default
    Route::get('/home', 'HomeController@index')->name('home');
});




});// lang