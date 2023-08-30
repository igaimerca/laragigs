<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// all listings
Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// get edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// update the listing
Route::put("/listings/{listing}/update", [ListingController::class, 'update']);

// delete a listing
Route::delete("/listings/{listing}", [ListingController::class, 'destroy']);

// store listing
Route::post('/listings', [ListingController::class, 'store']);

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register/create form
Route::get('/register', [UserController::class, 'create']);

// store/ create a new user
Route::post('/users', [UserController::class, 'store']);

// log user out
Route::post('/logout', [UserController::class, 'logout']);

// show login
Route::get('/login', [UserController::class, 'login']);

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);