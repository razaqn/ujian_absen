<?php

use Illuminate\Support\Facades\Route;

// import backend contoller
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\AbsenController;
use App\Http\Controllers\Backend\MapelController as BackendMapelController;

// user
Route::get('/backend/manage/user', [BackendUserController::class, 'index'])->name("backend.manage.user");
Route::get('/backend/create/user', [BackendUserController::class, 'create'])->name("backend.create.user");
Route::post('/backend/create/process/user', [BackendUserController::class, 'create_process'])->name("backend.create.process.user");
Route::get('/backend/edit/user/{id?}', [BackendUserController::class, 'edit'])->name("backend.edit.user");
Route::post('/backend/edit/process/user', [BackendUserController::class, 'edit_process'])->name("backend.edit.process.user");
Route::delete('/backend/destroy/process/user/{id?}', [BackendUserController::class, 'destroy'])->name("backend.destroy.process.user");

Route::get('/backend/manage/mapel', [BackendMapelController::class, 'index'])->name("backend.manage.mapel");
Route::get('/backend/mapel/create', [BackendMapelController::class, 'create'])->name('backend.create.mapel');
Route::post('/backend/mapel/create', [BackendMapelController::class, 'store'])->name('backend.mapel.store');
Route::get('/backend/show/mapel/{mapel}', [BackendMapelController::class, 'show'])->name('backend.show.mapel');

Route::get('/backend/mapel/edit/{mapel}', [BackendMapelController::class, 'edit'])->name('backend.mapel.edit');
Route::post('/backend/mapel/edit/process/{mapel}', [BackendMapelController::class, 'edit_process'])->name('backend.edit.process.mapel');
Route::delete('/backend/mapel/destroy/{mapel}', [BackendMapelController::class, 'destroy'])->name('backend.mapel.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/backend/manage/absen', [AbsenController::class, 'index'])->name("backend.manage.absensi");
