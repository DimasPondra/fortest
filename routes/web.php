<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('create', [StudentController::class, 'create'])->name('students.create');
    Route::post('store', [StudentController::class, 'store'])->name('students.store');
    Route::get('{student:nis}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::patch('{student:nis}/update', [StudentController::class, 'update'])->name('students.update');
    Route::delete('{student:nis}/delete', [StudentController::class, 'destroy'])->name('students.delete');
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::get('create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::patch('{course}/update', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('{course}/delete', [CourseController::class, 'destroy'])->name('courses.delete');
});

Route::prefix('exams')->group(function () {
    Route::get('/', [ExamController::class, 'index'])->name('exams.index');
    Route::get('create', [ExamController::class, 'create'])->name('exams.create');
    Route::post('store', [ExamController::class, 'store'])->name('exams.store');
    Route::get('{exam}/add-student', [ExamController::class, 'addStudent'])->name('exams.add-student');
    Route::post('{exam}/add-student/store', [ExamController::class, 'addStudentStore'])->name('exams.add-student.store');
});

Route::prefix('tasks')->group(function () {
    Route::get('task-2', [TaskController::class, 'task2'])->name('tasks.task-2');
    Route::get('task-3', [TaskController::class, 'task3'])->name('tasks.task-3');
});
