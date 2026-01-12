<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::get('/login', [Controllers\AuthController::class, 'showLoginForm'])->name('login')->middleware(['guest']);
Route::post('/login', [Controllers\AuthController::class, 'login'])->name('login')->middleware(['guest']);
Route::get('/register', [Controllers\AuthController::class, 'showRegisterForm'])->name('register')->middleware(middleware: ['guest']);
Route::post('/register', [Controllers\AuthController::class, 'register'])->name('register')->middleware(['guest']);
Route::post('/logout', [Controllers\AuthController::class, 'logout'])->name('logout')->middleware(['auth']);
Route::get('/dashboard', [Controllers\RedirectController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::get('/student/dashboard', [Controllers\StudentController::class, 'index'])->name('student.dashboard')->middleware(['auth', 'student']);
Route::get('/student/done/{homework_id}', [Controllers\StudentController::class, 'done'])->name('done')->middleware(['auth', 'student']);

Route::get('/teacher/dashboard', [Controllers\TeacherController::class, 'index'])->name('teacher.dashboard')->middleware(['auth', 'teacher']);
Route::get('/teacher/create', [Controllers\TeacherController::class, 'showCreateForm'])->name('teacher.create')->middleware(['auth', 'teacher']);
Route::post('/teacher/store', [Controllers\TeacherController::class, 'store'])->name('teacher.store')->middleware(['auth', 'teacher']);
Route::get('/teacher/edit/{homework_id}', [Controllers\TeacherController::class, 'showEditForm'])->name('teacher.edit')->middleware(['auth', 'teacher']);
Route::post('/teacher/edit/{homework_id}', [Controllers\TeacherController::class, 'edit'])->name('teacher.edit.store')->middleware(['auth', 'teacher']);
Route::get('/teacher/delete/{homework_id}', [Controllers\TeacherController::class, 'delete'])->name('teacher.delete')->middleware(['auth', 'teacher']);
Route::get('/teacher/addSubject', [Controllers\TeacherController::class, 'addSubject'])->name('teacher.addSubject')->middleware(['auth', 'teacher']);
Route::post('/teacher/storeSubject', [Controllers\TeacherController::class, 'storeSubject'])->name('teacher.storeSubject')->middleware(['auth', 'teacher']);
Route::get('/teacher/deleteSubject/{subject_id}', [Controllers\TeacherController::class, 'deleteSubject'])->name('teacher.deleteSubject')->middleware(['auth', 'teacher']);

