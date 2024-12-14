<?php

use App\Http\Controllers\Api\AboutControlller;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\Frontend\AboutController;
use App\Http\Controllers\Api\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\ReviewController;
use App\Http\Controllers\Api\Frontend\ServiceController;
use App\Http\Controllers\Api\Frontend\SettingsFrontendController;
use App\Http\Controllers\Api\HeadingController;
use App\Http\Controllers\Api\ReviewsController;
use App\Http\Controllers\Api\ServicePageController;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\TeamController;
use App\Mail\LuminafixMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/abouts', AboutControlller::class);
    Route::apiResource('/service-pages', ServicePageController::class);
    Route::get('/headings/blog', [HeadingController::class, 'blogs']);
    Route::apiResource('/headings', HeadingController::class);
    Route::apiResource('/reviews', ReviewsController::class);
    Route::apiResource('/settings', SettingsController::class);
    Route::apiResource('/services', ServicesController::class)->parameters([
        'services' => 'slug'
    ]);
    Route::apiResource('/teams', TeamController::class)->parameters([
        'teams' => 'slug'
    ]);
    Route::apiResource('/blogs', BlogController::class)->parameters([
        'blogs' => 'slug'
    ]);
});
Route::get('/about', [AboutController::class, 'index']);
Route::get('/service-page', [ServiceController::class, 'index']);
Route::get('/service/{slug}', [ServiceController::class, 'singleService']);
Route::get('/blog', [FrontendBlogController::class, 'index']);
Route::get('/blog/{slug}', [FrontendBlogController::class, 'BlogDetails']);
Route::get('/related-blog', [FrontendBlogController::class, 'relatedBlogs']);
Route::get('/blog-heading', [FrontendBlogController::class, 'BlogHeadings']);
Route::get('/review', [ReviewController::class, 'index']);
Route::get('/setting', [SettingsFrontendController::class, 'index']);
Route::post('/contact/store', [ContactController::class, 'store']);