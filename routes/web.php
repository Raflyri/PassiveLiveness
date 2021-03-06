<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\FileUploadController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/upload-unittest', 'App\Http\Controllers\TestFileUpload@unit_test')->name('upload.unittest');

Route::get('/token', function () {

    $token = csrf_token();
    return response()->json(['token' => $token]);
    // return csrf_token(); 
});

Route::get('upload', 'App\Http\Controllers\FileUploadController@index');

Route::post('upload', 'App\Http\Controllers\FileUploadController@upload')->name('upload');
