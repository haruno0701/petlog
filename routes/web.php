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
    Route::get('detail/delete', 'deleteDetail')->name('deleteDetail');
    Route::get('weight/delete', 'deleteWeight')->name('deleteWeight');
    Route::get('temperature/delete', 'deleteTemperature')->name('deleteTemperature');
    Route::get('stroll/delete', 'deleteStroll')->name('deleteStroll');
    Route::get('urine/delete', 'deleteUrine')->name('deleteUrine');
    Route::get('flight/delete', 'deleteFlight')->name('deleteFlight');
    Route::get('pet/vital', 'vital')->name('vital');
    Route::get('pet/vitallist', 'vitallist')->name('vitallist');
    Route::get('pet/weight', 'manageWeight')->name('manageWeight');
    Route::post('pet/weight', 'registHealth')->name('registHealth');
    Route::get('pet/temperature', 'manageTemperature')->name('manageTemperature');
    Route::post('pet/temperature', 'registHealth')->name('registHealth');
    Route::get('pet/stroll', 'manageStroll')->name('manageStroll');
    Route::post('pet/stroll', 'registHealth')->name('registHealth');
    Route::get('pet/urine', 'manageUrine')->name('manageUrine');
    Route::post('pet/urine', 'registHealth')->name('registHealth');
    Route::get('pet/flight', 'manageFlight')->name('manageFlight');
    Route::post('pet/flight', 'registHealth')->name('registHealth');
    Route::get('pet/weightComparison', 'comparison')->name('comparison');


});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




