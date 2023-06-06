<?php

use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// show question and answer at homepage
Route::get('question-show/{id}', [HomeController::class, 'questionShow'])->name('questionShow');
Route::post('filter-by-category', [HomeController::class, 'filterByCategory'])->name('filterByCategory');
Route::post('search', [HomeController::class, 'search'])->name('search');


// authentication routes
Route::get('sign-in', [AuthController::class, 'signin'])->name('signin');
Route::post('sign-in', [AuthController::class, 'postSignin'])->name('signin');
Route::get('sign-up', [AuthController::class, 'signup'])->name('signup');
Route::post('sign-up', [AuthController::class, 'postSignup'])->name('signup');
Route::post('sign-out', [AuthController::class, 'signout'])->name('signout');


Route::middleware('auth')->group(function () {

    Route::get('dashboard', DashboardController::class)->name('dashboard')->middleware('admin.check');

    Route::resource('users', UserController::class)->middleware('admin.check');
    Route::resource('categories', CategoryController::class)->middleware('admin.check');
    Route::resource('questions', QuestionController::class);

    // question manage routes for user
    Route::get('user/questions', [UserQuestionController::class, 'index'])->name('user.questions.index');
    Route::get('user/questions/create', [UserQuestionController::class, 'create'])->name('user.questions.create');
    Route::post('user/questions/store', [UserQuestionController::class, 'store'])->name('user.questions.store');
    Route::get('user/questions/show/{id}', [UserQuestionController::class, 'show'])->name('user.questions.show');
    Route::get('user/questions/edit/{id}', [UserQuestionController::class, 'edit'])->name('user.questions.edit');
    Route::put('user/questions/update/{id}', [UserQuestionController::class, 'update'])->name('user.questions.update');
    Route::delete('user/questions/destroy/{id}', [UserQuestionController::class, 'destroy'])->name('user.questions.destroy');

    // answer manage routes for user
    Route::get('answers/create/{id}', [AnswerController::class, 'create'])->name('answers.create');
    Route::post('answers/{id}', [AnswerController::class, 'store'])->name('answers.store');
    // reply from dashboard
    Route::get('reply/create/{id}', [AnswerController::class, 'reply'])->name('reply.create');
    Route::post('reply/{id}', [AnswerController::class, 'storeReply'])->name('reply.store');
    // confirm correct answer
    Route::get('correct-answers/{id}', [AnswerController::class, 'correctAnswer'])->name('correct.answer');
    // delete answer
    Route::delete('delete-answers/{id}', [AnswerController::class, 'deleteAnswer'])->name('answer.destroy');
   
    // profile manage routes for user
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
