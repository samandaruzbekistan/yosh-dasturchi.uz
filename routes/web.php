<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
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

Route::get('/',[UserController::class,'index'])->name('user.index');
Route::view('/about','user.about')->name('user.about');
Route::view('/login','user.login')->name('user.login');
Route::view('/register','user.register')->name('user.register');
Route::get('/section/{id}', [SectionController::class, 'view_section'])->name('user.section');

Route::get('districts/{region_id?}', [UserController::class,'districts'])->name('district.regionID');
Route::get('quarters/{district_id?}', [UserController::class,'quarters'])->name('quarter.districtID');


Route::post('/register', [UserController::class, 'register'])->name('user.register.post');
Route::post('/auth', [UserController::class, 'authenticate'])->name('user.auth');

Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lesson.show');

Route::middleware(['userAuth'])->group(function () {
    Route::get('/logout', [UserController::class,'logout'])->name('user.logout');
    Route::post('/quiz-check',[LessonController::class, 'check'])->name('user.test.check');
    Route::get('/profile', [UserController::class,'profile'])->name('user.profile');
});


Route::prefix('admin')->group(callback: function () {
    Route::view('/', 'admin.login')->name("admin.login");
    Route::post('/auth', [AdminController::class,'auth'])->name('admin.auth');
    Route::get('/logout', [AdminController::class,'logout'])->name('admin.logout');
    Route::view('/profile', 'admin.profile')->name('admin.profile');
    Route::post('profile',[AdminController::class, 'update_password'])->name('admin.password.update');

    Route::middleware(['adminAuth'])->group(function () {
        Route::get('sections', [SectionController::class, 'index'])->name('admin.home');
        Route::post('/sections', [SectionController::class, 'store'])->name('admin.section.store');

        Route::get('/lessons/{section_id}', [LessonController::class, 'index'])->name('admin.lessons');
        Route::post('/lesson-store', [LessonController::class, 'store'])->name('admin.lesson.upload');
        Route::get('/lesson-edit/{id}', [LessonController::class, 'edit_form'])->name('admin.lesson.edit');
        Route::post('/lesson-update/{id}', [LessonController::class, 'update'])->name('admin.lesson.update');
        Route::delete('/lessons/{lesson_id}', [LessonController::class, 'delete'])->name('admin.lesson.delete');;
        Route::get('/lesson-results/{id}', [LessonController::class, 'quiz_results'])->name('admin.quiz.results');

        Route::post('/quizzes', [QuizController::class, 'store'])->name('admin.quiz.store');
        Route::get('/quizzes/{id}', [QuizController::class, 'index'])->name('admin.lesson.quizzes');
        Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('admin.quiz.delete');

        Route::get('users', [UserController::class, 'users'])->name('admin.users');
        Route::get('user/{id}', [UserController::class, 'user_profile'])->name('admin.user');
        Route::get('section-users/{id}', [SectionController::class, 'section_students'])->name('admin.section.users');
    });
});


//Route::get('/sections/{id}', [SectionController::class, 'show']);

Route::delete('/sections/{id}', [SectionController::class, 'destroy']);
Route::post('/sections/{id}/increment', [SectionController::class, 'incrementLessonCount']);
//Route::post('/sections/{id}/decrement', [SectionController::class, 'decrementLessonCount']);
Route::get('/sections/search', [SectionController::class, 'search']);
Route::get('/sections/count', [SectionController::class, 'count']);


Route::get('/lessons', [LessonController::class, 'index']);

Route::put('/lessons/{id}', [LessonController::class, 'update']);
Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);
Route::get('/lessons/search', [LessonController::class, 'search']);
Route::get('/lessons/count', [LessonController::class, 'count']);
