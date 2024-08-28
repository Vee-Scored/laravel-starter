<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PeopleController;

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

Route::get("/",function () {
    return view('welcome');
});

Route::resource('item',ItemController::class);

Route::resource('category',CategoryController::class);

Route::resource('/phone',PhoneController::class);

Route::resource('/person',PeopleController::class);

Route::get("/search",[ItemController::class,"search"])->name("item.search");

Route::get("/categorySearch",[CategoryController::class,"search"])->name("category.search");
Route::get("/user",[UserController::class,"index"])->name("user.index");
Route::get("/userSearch",[UserController::class,"search"])->name("user.search");

