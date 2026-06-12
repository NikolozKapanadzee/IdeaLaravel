<?php

declare(strict_types=1);

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;


Route::redirect("/", "/ideas");
Route::get('/ideas', [IdeaController::class, 'index'])->name("idea.index")->middleware("auth");
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name("idea.show")->middleware("auth");
Route::get("/register", [RegisterUserController::class, "create"])->middleware('guest');
Route::post("/register", [RegisterUserController::class, "store"])->middleware('guest');
Route::get("/login", [LoginUserController::class, "create"])->name("login")->middleware('guest');
Route::post("/login", [LoginUserController::class, "store"])->middleware('guest');
Route::post("logout", [LoginUserController::class, "destroy"])->middleware('auth');
