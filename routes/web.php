<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get("/",[HomeController::class,"index"]);

Route::get("/surat/{id?}",[HomeController::class,"edit"]);

Route::post("/surat",[HomeController::class,"store"])->name("surat.store");

Route::put("/surat/{id?}",[HomeController::class,"update"])->name("surat.update");

Route::get("/surat/{id?}",[HomeController::class,"destroy"]);