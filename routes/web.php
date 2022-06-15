<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\XlsxController;

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
    return view('main');
});

// Route for download json-file
Route::get('/json', [JsonController::class, 'index'])->name('json');

// Route for download xlsx-file
Route::get('/export', [XlsxController::class, 'index'])->name('xlsx');
