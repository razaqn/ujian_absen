<?php

use Illuminate\Support\Facades\Auth;

// import backend contoller
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController as BackendUserController;

use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;

// user
Route::get('/backend/manage/user', [BackendUserController::class, 'index'])->name("backend.manage.user");
Route::get('/backend/create/user', [BackendUserController::class, 'create'])->name("backend.create.user");
Route::post('/backend/create/process/user', [BackendUserController::class, 'create_process'])->name("backend.create.process.user");
Route::get('/backend/edit/user/{id?}', [BackendUserController::class, 'edit'])->name("backend.edit.user");
Route::post('/backend/edit/process/user', [BackendUserController::class, 'edit_process'])->name("backend.edit.process.user");
Route::delete('/backend/destroy/process/user/{id?}', [BackendUserController::class, 'destroy'])->name("backend.destroy.process.user");

// Frontend
Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
