<?php

use App\Http\Controllers\PuntosGpsController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PuntosGpsController::class, "index"]);
Route::get("/upload-csv", [PuntosGpsController::class, "create"]);
Route::post("/upload-csv", [PuntosGpsController::class, "store"]);
Route::get("/map-generate", [PuntosGpsController::class, "show"]);


