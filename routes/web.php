<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HodController;
use App\Http\Controllers\ResourceAllocatorController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('layouts.admin');
// });


//Route::resource('admin',AdminController::class);
/*==================ADMIN ROUTES=======================================*/
Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/add_user',[AdminController::class, 'add_user'])->name('admin.add_new_user');
Route::get('/admin/view_user',[AdminController::class, 'view_user'])->name('admin.view_user');
Route::get('/admin/add_department',[AdminController::class, 'add_department'])->name('admin.add_department');
Route::get('/admin/view_department',[AdminController::class, 'view_department'])->name('admin.view_department');
Route::get('/admin/add_usertype',[AdminController::class, 'add_usertype'])->name('admin.add_usertype');
Route::get('/admin/view_usertype',[AdminController::class, 'view_usertype'])->name('admin.view_usertype');
Route::get('/admin/view_syslogs',[AdminController::class, 'view_syslogs'])->name('admin.view_syslogs');

Route::post('/admin/create', [AdminController::class, 'create'])->name('admin.add_user');


/*===================================HOD ROUTES=======================================*/
Route::get('/hod/dashboard',[HodController::class, 'dashboard'])->name('hod.dashboard');
Route::get('/hod/view_student',[HodController::class, 'view_student'])->name('hod.view_student');
Route::get('/hod/view_allocated_resource',[HodController::class, 'view_allocated_resource'])->name('hod.view_allocated_resource');
Route::get('/hod/issue_resource',[HodController::class, 'issue_resource'])->name('hod.issue_resource');
Route::get('/hod/view_issued_resource',[HodController::class, 'view_issued_resource'])->name('hod.view_issued_resource');
Route::get('/hod/view_returned_resource',[HodController::class, 'view_returned_resource'])->name('hod.view_returned_resource');
Route::get('/hod/view_lost_resource',[HodController::class, 'view_lost_resource'])->name('hod.view_lost_resource');


/*===========================RESOURCE ALLOCATOR ROUTES==================================*/
Route::get('/ra/dashboard', [ResourceAllocatorController::class, 'dashboard'])->name('ra.dashboard');
Route::get('/ra/add_new_resource', [ResourceAllocatorController::class, 'add_new_resource'])->name('ra.add_new_resource');
Route::get('/ra/allocate_resource', [ResourceAllocatorController::class, 'allocate_resource'])->name('ra.allocate_resource');
Route::get('/ra/view_custodians', [ResourceAllocatorController::class, 'view_custodians'])->name('ra.view_custodians');
Route::get('/ra/view_department', [ResourceAllocatorController::class, 'view_department'])->name('ra.view_department');
Route::get('/ra/view_lost_resource', [ResourceAllocatorController::class, 'view_lost_resource'])->name('ra.view_lost_resource');
Route::get('/ra/view_resource', [ResourceAllocatorController::class, 'view_resource'])->name('ra.view_resource');
