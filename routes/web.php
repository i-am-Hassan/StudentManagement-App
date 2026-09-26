<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::delete('/students/delete-all', [StudentController::class, 'destroyAll'])
    ->name('students.destroyAll');

Route::resource('/students', StudentController::class);

Route::delete('/teachers/delete-all', [TeacherController::class, 'destroyAll'])
    ->name('teachers.destroyAll');

Route::resource('/teachers', TeacherController::class);

Route::delete('/courses/delete-all', [CourseController::class, 'destroyAll'])
    ->name('courses.destroyAll');

Route::resource('/courses', CourseController::class);

Route::delete('/batches/delete-all', [BatchController::class, 'destroyAll'])
    ->name('batches.destroyAll');

Route::resource('/batches', BatchController::class);

Route::delete('/enrollments/delete-all', [EnrollmentController::class, 'destroyAll'])
    ->name('enrollments.destroyAll');

Route::resource('/enrollments', EnrollmentController::class);

Route::delete('/payments/delete-all', [PaymentController::class, 'destroyAll'])
    ->name('payments.destroyAll');

Route::resource('/payments', PaymentController::class);

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');
