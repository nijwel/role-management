<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::group(['middleware'=>'auth'], function() {

   Route::group(['prefix' => 'employee'], function() {
     Route::get('index',[EmployeeController::class, 'index'])->name('index.employee');
     Route::get('create',[EmployeeController::class, 'create'])->name('create.employee');
     Route::post('create',[EmployeeController::class, 'store'])->name('store.employee');
     Route::get('edit/{edit}',[EmployeeController::class, 'edit'])->name('edit.employee');
     Route::post('update/{edit}',[EmployeeController::class, 'update'])->name('update.employee');
     Route::get('delete/{edit}',[EmployeeController::class, 'destroy'])->name('delete.employee');
   });

   Route::group(['prefix' => 'manager'], function() {
     Route::get('index',[ManagerController::class, 'index'])->name('index.manager')->middleware(['auth', 'is-manager']);
     Route::get('create',[ManagerController::class, 'create'])->name('create.manager')->middleware(['auth', 'is-create-manager']);
     Route::post('create',[ManagerController::class, 'store'])->name('store.manager');
     Route::get('edit/{edit}',[ManagerController::class, 'edit'])->name('edit.manager')->middleware(['auth', 'is-edit-manager']);
     Route::post('update/{edit}',[ManagerController::class, 'update'])->name('update.manager');
     Route::get('delete/{edit}',[ManagerController::class, 'destroy'])->name('delete.manager')->middleware(['auth', 'is-delete-manager']);
   });
});
