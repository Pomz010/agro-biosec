<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChangePassword;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisitorFormController;
use App\Http\Controllers\EmployeeFormController;
use App\Http\Controllers\ChangePasswordController;

Route::get('/form-menu', [MenuController::class, 'showMenu']);

// Employee response related routes
Route::get('/employee-response/create', [EmployeeFormController::class, 'createResponse']);
Route::post('/employee-response/submit', [EmployeeFormController::class, 'submitEmployeeResponse']);

// Visitor response related routes
Route::get('/visitor-response/create', [VisitorFormController::class, 'createResponse']);
Route::post('/visitor-response/submit', [VisitorFormController::class, 'submitVisitorResponse']);

// User related routes
Route::middleware('auth', ChangePassword::class)->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('employee.index');
    Route::post('/', [DashboardController::class, 'index'])->name('employee.index');
    Route::get('/employee-create', [DashboardController::class, 'create'])->name('employee.create');
    Route::get('/employee-list/{respondent}', [DashboardController::class, 'show'])->name('employee.show');
    Route::put('/employee-list/{respondent}', [DashboardController::class, 'update'])->name('employee.update');
    Route::get('/response-filter', [DashboardController::class, 'showFilter'])->name('response.show');

    //Employee related routes
    Route::post('/employee-list', [EmployeeController::class, 'store'])->name('employee.store');

    // Users related routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destory');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('/back', [ChangePasswordController::class, 'previousPage'])->name('previous.page');
});

// Login related routes
Route::get('/change-password/{user}', [ChangePasswordController::class, 'changePassword'])->name('change.password')->middleware('auth');
Route::put('/change-password/{user}', [ChangePasswordController::class, 'updatePassword'])->name('update.password')->middleware('auth');



Route::get('/login', [DashboardController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
Route::post('/login', [DashboardController::class, 'authenticate'])->name('login.authenticate');




