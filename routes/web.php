<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('courseouteline')->group(function(){
    Route::get('',function(){
        $artisan1 = collect(Storage::allFiles('public/courseoutline/Artisan/Year1'))->map(function($image){
            // Read image path, convert to base64 encoding
            $imgData = base64_encode(Storage::get($image));

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data: '.Storage::mimeType($image).';base64,'.$imgData;

            // Echo out a sample image
            return $src;
        });

        $artisan2 = collect(Storage::allFiles('public/courseoutline/Artisan/Year2'))->map(function($image){
            // Read image path, convert to base64 encoding
            $imgData = base64_encode(Storage::get($image));

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data: '.Storage::mimeType($image).';base64,'.$imgData;

            // Echo out a sample image
            return $src;
        });

        $nita1 = collect(Storage::allFiles('public/courseoutline/Artisan/NITA1'))->map(function($image){
            // Read image path, convert to base64 encoding
            $imgData = base64_encode(Storage::get($image));

            // Format the image SRC:  data:{mime};base64,{data};
            $src = 'data: '.Storage::mimeType($image).';base64,'.$imgData;

            // Echo out a sample image
            return $src;
        });

        return view('courseouteline',compact('artisan1','artisan2','nita1'));
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/subjects', function () {
        return Inertia::render('Subjects');
    })->name('subjects');
});
