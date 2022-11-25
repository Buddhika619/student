<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Listing/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//all listings
Route::get('/student', [ListingController::class, 'index']);




// show create Form 
Route::get('student/listings/create', [ListingController::class, 'create']);


//store listing data
Route::post('/student/listings', [ListingController::class, 'store']);


//show edit form
Route::get('/student/listings/{listing}/edit', [ListingController::class, 'edit']);


//update listing
Route::put('student/listings/{listing}', [ListingController::class, 'update']);


//Delete listing
Route::delete('student/listings/{listing}', [ListingController::class, 'delete']);



// single listing
Route::get('student/listings/{listing}', [ListingController::class, 'show']);


require __DIR__ . '/auth.php';
