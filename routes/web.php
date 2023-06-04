<?php

use App\Http\Controllers\AnswerController;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;

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

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('question-show/{id}', [HomeController::class, 'questionShow'])->name('questionShow');
Route::post('filter-by-category', [HomeController::class, 'filterByCategory'])->name('filterByCategory');
Route::post('search', [HomeController::class, 'search'])->name('search');



Route::get('sign-in', [AuthController::class, 'signin'])->name('signin');
Route::post('sign-in', [AuthController::class, 'postSignin'])->name('signin');
Route::get('sign-up', [AuthController::class, 'signup'])->name('signup');
Route::post('sign-up', [AuthController::class, 'postSignup'])->name('signup');
Route::post('sign-out', [AuthController::class, 'signout'])->name('signout');


Route::middleware('auth')->group(function () {
    
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('questions', QuestionController::class);

    Route::get('answers/create/{id}', [AnswerController::class,'create'])->name('answers.create');
    Route::post('answers/{id}', [AnswerController::class,'store'])->name('answers.store');

    Route::get('profile', [ProfileController::class,'index'])->name('profile');
    Route::put('profile/update', [ProfileController::class,'update'])->name('profile.update');
});
