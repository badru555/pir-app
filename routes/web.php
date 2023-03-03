<?php

use App\Http\Controllers\ApplicationDocumentResource;
use App\Http\Controllers\ApplicationResource;
use App\Http\Controllers\BatchResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\FaqResource;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionResource;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResource;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserResource;
use Illuminate\Support\Facades\Route;

Route::get('/devtest', [TestController::class, 'index']);

Route::get('/', [Controller::class, 'index']);
Route::get('/faq', [Controller::class, 'faq']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/application', [SurveyController::class, 'application']);
Route::get('/survey/{application}', [SurveyController::class, 'survey']);
Route::resource('surveys', SurveyResource::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/surveylist/{id}', [SurveyResource::class, 'detail']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UserResource::class);
    Route::resource('faqs', FaqResource::class);
    Route::resource('applications', ApplicationResource::class);
    Route::resource('questions', QuestionResource::class);
    Route::resource('applicationdocuments', ApplicationDocumentResource::class);
    Route::resource('batches', BatchResource::class);
    Route::get('draft/{applicationdocument}', [DraftController::class, 'pir']);
    Route::get('getbatchlist/{application_id}', [BatchResource::class, 'getbatchlist']);
});
