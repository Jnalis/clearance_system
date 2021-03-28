<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('pages.admin.index');
// });


Route::resource('admin',AdminController::class);