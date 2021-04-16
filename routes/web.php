<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('layouts.admin');
// });


Auth::routes();

Route::get('/', [MainController::class, 'index'])->middleware('auth')->name('home');

Route::get('/student', [MainController::class, 'student'])->name('student');


Route::namespace('Admin')->prefix('admin')->as('admin.')->middleware('admin', 'auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/staff', 'StaffsController');
    Route::resource('/department', 'DepartmentsController');
    Route::resource('/usertype', 'UsertypesController');
    Route::resource('/systemlog', 'SystemlogsController');
});


Route::namespace('HOD')->prefix('hod')->as('hod.')->middleware('hod','auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/student', 'StudentController');
    Route::resource('/allocatedResource', 'AllocatedResourceController');
    Route::resource('/issuedResource', 'IssuedResourceController');
    Route::resource('/lostResource', 'LostResourceController');
    Route::resource('/hodComment', 'HodCommentController');
    Route::resource('/program', 'ProgramController');
});


Route::namespace('RA')->prefix('ra')->as('ra.')->middleware('ra','auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/resource', 'ResourceController');
    Route::resource('/viewDeptRA', 'ViewDeptRAController');
    Route::resource('/allocatedResource', 'AllocateResourceController');
    Route::resource('/lostResource', 'LostResourceController');
    Route::resource('/custodian', 'CustodianController');
});


Route::namespace('Dean')->prefix('dean')->as('dean.')->middleware('dean', 'auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/student', 'StudentController');
    Route::resource('/resourceList', 'ResourceController');
    Route::resource('/resourceIssued', 'ResourceIssuedController');
    Route::resource('/resourceLost', 'ResourceLostController');
    Route::resource('/deanComment', 'DcommentController');
});

