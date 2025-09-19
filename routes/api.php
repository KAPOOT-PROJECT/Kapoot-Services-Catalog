<?php

use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('services' , ServiceController::class);
Route::apiResource('serviceCategories', ServiceCategoryController::class);
