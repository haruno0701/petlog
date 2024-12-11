<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Admin\PetController;
Route::controller(PetController::class)->prefix('admin')->name('admin.pet.')->middleware('auth')->group(function() {
    Route::get('pet/signup', 'add')->name('add');
    Route::post('pet/signup', 'create')->name('create');  
    Route::get('pet/top', 'index')->name('index');
    Route::post('pet/top', 'update')->name('update');
    Route::get('pet/delete', 'delete')->name('delete');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// use App\Http\Controllers\Create\PetController2;
// Route::controller(PetController2::class)->prefix('create')->name('create.pet.')->middleware('auth')->group(function() {
//     Route::get('pet/top', 'add')->name('add');
//     Route::post('pet/top', 'create')->name('create');
//     Route::get('pet/signup', 'edit')->name('edit');
//     Route::post('pet/signup', 'update')->name('update');
    
// });

// Auth::routes();


