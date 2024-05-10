<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\VideoController;
use App\Http\Controllers\V1\ImageController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/images', [ImageController::class, 'getImages'])->name('get.images');

// // Route::post('/videos', [VideoController::class, 'upload']);
// Route::get('/videos/{id}', [VideoController::class, 'show']);
Route::get('/videos', [VideoController::class, 'getVideos'])->name('get.videos');


        /*   Test Api    */
