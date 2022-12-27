<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinancingController;
use App\Http\Controllers\LenderController;
use App\Http\Controllers\LoanerController;
use App\Http\Controllers\PaymentController;
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
    return view('login');
})->name("login");
Route::post('/authenticate', [AuthController::class, "authenticate"])->name("authenticate");
Route::post('/logout', [AuthController::class, "logout"])->name("logout");

Route::prefix("/admin")->middleware("auth")->group(function () {
    Route::get("dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::resource("lenders", LenderController::class);
    Route::resource("clients", LoanerController::class);
    Route::resource("loans", FinancingController::class);
    Route::resource("payments", PaymentController::class);
    Route::get("data/{id}", [LoanerController::class, "data"])->name("loans.data");
});

