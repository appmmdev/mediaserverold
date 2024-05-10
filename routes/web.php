<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\V1\ImageController;
use App\Http\Controllers\V1\VideoController;

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

Route::get('/', function () {
    return view('images.index');
});
Route::get('/videos/{date}/{filename}', function ($date, $filename) {
    $path = storage_path('app/videos/' . $date . '/' . $filename);

    // Check if the file exists
    if (!Storage::exists('videos/' . $date . '/' . $filename)) {
        abort(404);
    }

    // Return the file response
    return response()->file($path);
});


Route::get('/images/{date}/{filename}', function ($date, $filename) {
    $path = storage_path('app/images/' . $date . '/' . $filename);

    // Check if the file exists
    if (!Storage::exists('images/' . $date . '/'  . $filename)) {
        abort(404);
    }

    // Return the file response
    return response()->file($path);
});
Route::get('/preview_images/{date}/{filename}', function ($date, $filename) {
    $path = storage_path('app/preview_images/' . $date . '/' . $filename);

    // Check if the file exists
    if (!Storage::exists('preview_images/' . $date . '/' . $filename)) {
        abort(404);
    }

    // Return the file response
    return response()->file($path);
});

// routes/web.php

Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('test/videos', [VideoController::class, 'test'])->name('videos.test');

Route::get('/upload/videos', [VideoController::class, 'showUploadForm'])->name('videos.form');
Route::post('/upload/videos', [VideoController::class, 'upload'])->name('videoupload');


Route::get('/upload/multi/videos', [VideoController::class, 'showMultiUploadForm'])->name('videos.form');
Route::post('/upload/multi/videos', [VideoController::class, 'multiupload'])->name('videos.multiupload');


// Route::get('/videos-api', [VideoController::class, 'getVideos'])->name('get.videos');
Route::delete('/delete/videos', [VideoController::class, 'destroy'])->name('delete.video');


Route::get('/upload/images', [ImageController::class, 'showUploadForm'])->name('images.form');
Route::post('/upload/images', [ImageController::class, 'upload'])->name('upload');
Route::get('/images', [ImageController::class, 'showImageGallery'])->name('image.gallery');
// Route::get('/images-api', [ImageController::class, 'getImages'])->name('get.images');
