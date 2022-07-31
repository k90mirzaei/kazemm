<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;


Route::post("login", [LoginController::class, 'login'])
    ->name("login");

Route::get("refresh", [RefreshController::class, 'refresh'])
    ->name("refresh.token");

Route::get("works", [WorkController::class, 'index']);

Route::get("works/{work}", [WorkController::class, 'show']);


Route::group(["middleware" => "auth:api"], function () {

    Route::resource('works', WorkController::class)
        ->except(['show', 'index']);

    Route::post("logout", [LoginController::class, 'logout'])
        ->name("logout")->middleware('auth:api');;
});
