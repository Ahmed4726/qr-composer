<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\QRCodeController;

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


    //     // Campaigns
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns-create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns-store', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns-show/{id}', [CampaignController::class, 'show'])->name('campaigns.show');
    Route::post('/campaigns-destryoy/{id}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');

//     // QRCode
    Route::get('qrcode/generate/{campaign}', [QRCodeController::class, 'generateQRCode'])->name('qrcode-generate');

//     // Coordinates
//     Route::get('coordinates', [DashboardController::class, 'getCoordinates'])->name('get-coordinates');
});

// // QR code track
Route::get('qrcode/track/{campaign}', [QRCodeController::class, 'qrcodeTrack'])->name('qrcode-track');




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

// // Locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// Route::middleware(['auth', 'locked'])->group(function () {
//     // User dashboard
//     Route::get('/', [DashboardController::class, 'userDashboard'])->name('user-dashboard');
//     Route::get('dashboard', [DashboardController::class, 'userDashboard'])->name('user-dashboard');

//     // Profile
//     Route::get('/profiles/{user}/edit', [ProfileController::class, 'editProfile'])->name('profile-edit');
//     Route::post('/profiles/{user}', [ProfileController::class, 'updateProfile'])->name('profile-update');
//     Route::post('/profiles/{user}/reset', [ProfileController::class, 'changePassword'])->name('profile-reset');

//     // Campaigns
//     Route::resource('campaigns', CampaignController::class);

//     // QRCode
//     Route::get('qrcode/generate/{campaign}', [QRCodeController::class, 'generateQRCode'])->name('qrcode-generate');

//     // Coordinates
//     Route::get('coordinates', [DashboardController::class, 'getCoordinates'])->name('get-coordinates');

//     // Set read notification
//     Route::post('notifications/read', [DashboardController::class, 'readNotification']);

//     Route::middleware(['permission:user_manage'])->prefix('admin')->group(function () {
//         // Roles
//         Route::resource('roles', Admin\RoleController::class);

//         // Users
//         Route::resource('users', Admin\UserController::class);
//         Route::post('users/setlock', [Admin\UserController::class, 'setLock']);

//         // Notifications
//         Route::resource('notifications', Admin\NotificationController::class);
//         Route::post('notifications/status', [Admin\NotificationController::class, 'setStatus']);

//         // Admin dashboard
//         Route::get('/', [Admin\DashboardController::class, 'adminDashboard']);
//         Route::post('campaigns/delete', [CampaignController::class, 'ajaxDelete']);
//     });
// });

// // Locked page
// Route::get('locked', [HomeController::class, 'lockedPage']);




