<?php

use App\Http\Controllers\HOD\Return_LostResourceController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Registrar\Clearancetype;
use App\Http\Controllers\Student\InitiateClearanceController;
use App\Http\Controllers\Student\ViewCommentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentEnterPassowrdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('layouts.admin');
// });

Route::group(['middleware' => 'back'], function () {



    Auth::routes();

    Route::get('/', [MainController::class, 'index'])->middleware('auth')->name('home');

   
    
    Route::post('/student', [StudentController::class, 'index'])->name('newStudent');

    Route::get('/password/{student}', [StudentController::class, 'enterPassword'])->name('enterPassword');

    Route::post('/passwordStore', [StudentController::class, 'storePassword'])->name('passwordStore');
    



    Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('admin', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/staff', 'StaffsController');
        Route::resource('/department', 'DepartmentsController');
        Route::resource('/usertype', 'UsertypesController');
        Route::resource('/systemlog', 'SystemlogsController');
    });


    Route::namespace('HOD')->prefix('hod')->as('hod.')->middleware('hod', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/returnResource/{returnResource}', 'ReturnLostController@returnResource')->name('returnResource');

        Route::get('/resourceLost/{resourceLost}', 'ReturnLostController@resourceLost')->name('resourceLost');

        Route::resource('/student', 'StudentController');
        Route::resource('/allocatedResource', 'AllocatedResourceController');
        Route::resource('/issuedResource', 'IssuedResourceController');
        Route::resource('/lostResource', 'LostResourceController');
        Route::resource('/hodComment', 'HodCommentController');
        Route::resource('/program', 'ProgramController');
    });


    Route::namespace('RA')->prefix('ra')->as('ra.')->middleware('ra', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/resource', 'ResourceController');
        Route::resource('/viewDeptRA', 'ViewDeptRAController');
        Route::resource('/allocatedResource', 'AllocateResourceController');
        Route::resource('/lostResource', 'LostResourceController');
        //Route::resource('/custodian', 'CustodianController');
    });


    Route::namespace('Dean')->prefix('dean')->as('dean.')->middleware('dean', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/returnResource/{returnResource}', 'ReturnLostController@returnResource')->name('returnResource');

        Route::get('/resourceLost/{resourceLost}', 'ReturnLostController@resourceLost')->name('resourceLost');

        Route::resource('/student', 'StudentController');
        Route::resource('/resource', 'ResourceController');
        Route::resource('/resourceIssued', 'ResourceIssuedController');
        Route::resource('/lostResource', 'lostResourceController');
        Route::resource('/deanComment', 'DcommentController');
    });


    Route::namespace('Registrar')->prefix('registrar')->as('registrar.')->middleware('registrar', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/clearancetype', 'ClearancetypeController');
        Route::resource('/certificate', 'CertificateController');
        Route::resource('/student', 'StudentController');
        Route::resource('/clearance', 'ClearanceStatusController');
    });

    Route::namespace('Bursar')->prefix('bursar')->as('bursar.')->middleware('bursar', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/student', 'StudentController');
        Route::resource('/resource', 'ResourceController');

        Route::get('/cautionMoney/{cautionMoney}/issueMoney', 'CautionMoneyController@index')->name('issueMoney');
        Route::post('/issueCautionMoney/{cautionMoney}', 'CautionMoneyController@store')->name('issue');
    });


    
    Route::namespace('Student')->prefix('student')->as('student.')->middleware('student', 'auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/viewComment', [ViewCommentController::class, 'index'])->name('viewComment');
        Route::get('/initiateClearance', [InitiateClearanceController::class, 'create'])->name('initiateClearance');
        Route::post('/storeClearance', [InitiateClearanceController::class, 'store'])->name('storeClearance');
        Route::get('/viewClearance', [InitiateClearanceController::class, 'index'])->name('viewClearance');
        Route::get('/downloadPdfFile/{downloadPdfFile}/downloadPdfFile', [InitiateClearanceController::class, 'downloadPdf'])->name('download');
        Route::delete('/deleteClearance/{deleteClearance}/deleteClearance', [InitiateClearanceController::class, 'deleteClearance'])->name('deleteClearance');

    });
}); // closing the prevent-back-history


