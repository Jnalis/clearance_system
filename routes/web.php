<?php

use App\Http\Controllers\Dean\HomeController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('layouts.admin');
// });



Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function(){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('/staff','StaffsController');
    Route::resource('/department','DepartmentsController');
    Route::resource('/usertype','UsertypesController');
    Route::resource('/systemlog','SystemlogsController');

});
Route::namespace('HOD')->prefix('hod')->as('hod.')->group(function(){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('/student','StudentController');
    Route::resource('/allocatedResource','AllocatedResourceController');
    Route::resource('/issuedResource','IssuedResourceController');
    Route::resource('/lostResource','LostResourceController');
    Route::resource('/hodComment','HodCommentController');

});
Route::namespace('RA')->prefix('ra')->as('ra.')->group(function(){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('/resource','ResourceController');
    Route::resource('/viewDeptRA','ViewDeptRAController');
    Route::resource('/allocatedResource','AllocateResourceController');
    Route::resource('/lostResource','LostResourceController');
    Route::resource('/custodian','CustodianController');

});
Route::namespace('Dean')->prefix('dean')->as('dean.')->group(function(){
    Route::get('/','HomeController@index')->name('home');
    Route::resource('/student','StudentController');
    Route::resource('/resourceList','ResourceController');
    Route::resource('/resourceIssued','ResourceIssuedController');
    Route::resource('/resourceLost','ResourceLostController');
    Route::resource('/deanComment','DcommentController');
});







