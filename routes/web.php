<?php

use Illuminate\Support\Facades\Route;

// import backend contoller
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\AbsenController as BackendAbsenController;
use App\Http\Controllers\Backend\MapelController as BackendMapelController;
use App\Http\Controllers\Backend\SiswaController as BackendSiswaController;
use App\Http\Controllers\Backend\ReportController as BackendReportController;

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


Route::get('/backend/manage/absen', [BackendAbsenController::class, 'index'])->name("backend.manage.absensi");
Route::get('/backend/edit/absen/{id?}', [BackendAbsenController::class, 'edit'])->name("backend.edit.absensi");
Route::post('/backend/edit_process/absen/{id?}', [BackendAbsenController::class, 'edit_process'])->name("backend.edit.process.absensi");
Route::get('/backend/create/absen/', [BackendAbsenController::class, 'create'])->name("backend.create.absensi");
Route::post('/backend/create_process/absen', [BackendAbsenController::class, 'create_process'])->name("backend.create.process.absensi");
Route::delete('/backend/delete/absen/{id?}', [BackendAbsenController::class, 'delete'])->name("backend.delete.absensi");


Route::get('/backend/manage/siswa', [BackendSiswaController::class, 'index'])->name("backend.manage.siswa");
Route::get('/backend/create/siswa', [BackendSiswaController::class, 'create'])->name("backend.create.siswa");
Route::post('/backend/create_process/siswa', [BackendSiswaController::class, 'create_process'])->name("backend.create.process.siswa");
Route::get('/backend/edit/siswa/{id?}', [BackendSiswaController::class, 'edit'])->name("backend.edit.siswa");
Route::post('/backend/edit_process/siswa', [BackendSiswaController::class, 'edit_process'])->name("backend.edit.process.siswa");

Route::get('/backend/manage/reporting', [BackendReportController::class, 'index'])->name("backend.manage.reporting");
Route::get('/backend/filter/reporting', [BackendReportController::class, 'filter'])->name("backend.filter.reporting");