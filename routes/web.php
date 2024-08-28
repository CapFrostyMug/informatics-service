<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

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

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect('/lead/create');
});

Route::prefix('/lead')->name('lead.')->group(function () {
    Route::get('/create', [LeadController::class, 'create'])->name('create');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LeadController::class, 'edit'])->name('edit');
    Route::post('/edit/{id}', [LeadController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LeadController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/lists-and-statistics')->name('lists-and-statistics.')->group(function () {
        Route::get('/', [LeadController::class, 'showListsAndStatistics'])->name('index');
        Route::post('/change-lead-status', [LeadController::class, 'changeLeadStatus'])->name('change-lead-status');
    });
});
