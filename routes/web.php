<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;

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

Route::get('/', function () {
    return view('welcome');
});
require __DIR__.'/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Front pages
Route::get('/features', function () {
    return view('user.features');
})->name('features');
Route::get('/pricing', function () {
    return view('user.pricing');
})->name('pricing');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');
Route::get('/FAQ', function () {
    return view('user.faq');
})->name('faq');

//stripe
Route::get('/stripe',[StripeController::class, 'stripe']);
Route::post('/process-payment',[StripeController::class, 'stripePost'])->name('stripe.post');