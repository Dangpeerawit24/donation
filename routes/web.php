<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    UserController,
    WelcomeController,
    QRCodeController,
    CampaignController,
    CategoryController,
    CategoriesdetailsController,
    CampaignTransactionController,
    CampaignTransactionComplete,
    DashboardController,
    LineLoginController,
    FormcampaignController,
    CampaignstatusController,
    PushevidenceController,
    CampaignstatusImgController,
    PinController,
    FormcampaighbirthdayController,
    FormcampaightextController,
    FormcampaighallController,
    FormcampaighgiveController,
    Auth\AuthenticatedSessionController
};

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Auth Routes
Route::get('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// Line Routes
Route::prefix('line')->name('line.')->group(function () {
    Route::get('/login', [LineLoginController::class, 'redirectToLine'])->name('login');
    Route::get('/callback', [LineLoginController::class, 'handleLineCallback'])->name('callback');
    Route::get('/', [LineLoginController::class, 'showDashboard'])->name('dashboard');
});

// Campaign Status Routes
Route::get('/campaignstatus', [CampaignstatusController::class, 'campaignstatus'])->name('campaignstatus');
Route::get('/campaignstatusimg', [CampaignstatusImgController::class, 'campaignstatusimg'])->name('campaignstatusimg');

// Form Campaign Routes
Route::prefix('formcampaign')->group(function () {
    Route::resource('/', FormcampaignController::class)->names('formcampaigh');
    Route::get('/details', [FormcampaignController::class, 'fetchformcampaighDetails'])->name('formcampaigh.details');
});
Route::prefix('formcampaighbirthday')->group(function () {
    Route::resource('/', FormcampaighbirthdayController::class)->names('formcampaighbirthday');
    Route::get('/details', [FormcampaighbirthdayController::class, 'fetchformcampaighbirthdayDetails'])->name('formcampaighbirthday.details');
});
Route::prefix('formcampaightext')->group(function () {
    Route::resource('/', FormcampaightextController::class)->names('formcampaightext');
    Route::get('/details', [FormcampaightextController::class, 'fetchformcampaightextdetails'])->name('formcampaightext.details');
});
Route::resource('formcampaighall', FormcampaighallController::class)->names('formcampaighall');
Route::resource('formcampaighgive', FormcampaighgiveController::class)->names('formcampaighgive');

// Push Evidence
Route::get('/pushevidence', [PushevidenceController::class, 'index'])->name('pushevidence.index');
Route::post('/pushevidencetouser', [PushevidenceController::class, 'pushevidencetouser'])->name('pushevidencetouser');

// PIN Routes
Route::get('/pin', [PinController::class, 'showForm'])->name('pin.form');
Route::post('/pin', [PinController::class, 'verifyPin'])->name('pin.verify');

// Super Admin Routes
Route::middleware(['auth', 'verified', 'super-admin'])->prefix('super-admin')->name('super-admin.')->group(function () {
    Route::view('/dashboard', 'super-admin.dashboard')->name('dashboard');
    Route::resource('campaigns', CampaignController::class);
    Route::resource('campaigns_transaction', CampaignTransactionController::class);
    Route::resource('campaign_transaction_complete', CampaignTransactionComplete::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('categoriesdetails', CategoriesdetailsController::class);
    Route::resource('users', UserController::class);
    Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qr-code.index');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// QR Code Routes
Route::prefix('qr-code')->name('qr-code.')->group(function () {
    Route::get('/', [QRCodeController::class, 'index'])->name('index');
    Route::post('/generate', [QRCodeController::class, 'generate'])->name('generate');
});

require __DIR__.'/auth.php';
