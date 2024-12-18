<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoriesdetailsController;
use App\Http\Controllers\CampaignTransactionController;
use App\Http\Controllers\CampaignTransactionComplete;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LineLoginController;
use App\Http\Controllers\FormcampaignController;
use App\Http\Controllers\CampaignstatusController;
use App\Http\Controllers\PushevidenceController;
use App\Http\Controllers\CampaignstatusImgController;
use App\Http\Controllers\PinController;
use App\Http\Controllers\FormcampaighbirthdayController;
use App\Http\Controllers\FormcampaightextController;
use App\Http\Controllers\FormcampaighallController;
use App\Http\Controllers\FormcampaighgiveController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\WebhookController;

Route::get('/login', [AuthenticatedSessionController::class, 'store']);
// Route::get('/login', function () { return view('auth.login');});

// Route::view('/test', 'test');


// Line App
Route::post('/webhook', [WebhookController::class, 'handle']);
Route::get('/line/login', [LineLoginController::class, 'redirectToLine'])->name('line.login');
Route::get('/line/callback', [LineLoginController::class, 'handleLineCallback'])->name('line.callback');
Route::get('/', [LineLoginController::class, 'showDashboard'])->name('welcome');
Route::get('/campaignstatus', [CampaignstatusController::class, 'campaignstatus'])->name('campaignstatus');
Route::get('/campaignstatusimg', [CampaignstatusImgController::class, 'campaignstatusimg'])->name('campaignstatusimg');
// Line Form
Route::resource('/formcampaigh', FormcampaignController::class);
Route::get('/fetch_formcampaigh_details', [FormcampaignController::class, 'fetchformcampaighDetails'])->name('fetch.formcampaigh.details');
Route::resource('/formcampaighbirthday', FormcampaighbirthdayController::class);
Route::get('/fetch_formcampaighbirthday_details', [FormcampaighbirthdayController::class, 'fetchformcampaighbirthdayDetails'])->name('fetch.formcampaighbirthday.details');
Route::resource('/formcampaightext', FormcampaightextController::class);
Route::get('/fetch_formcampaightext_details', [FormcampaightextController::class, 'fetchformcampaightextdetails'])->name('fetch.formcampaightext.details');
Route::resource('/formcampaighall', FormcampaighallController::class);
Route::get('/fetch_formcampaighall_details', [FormcampaighallController::class, 'fetchformcampaighalldetails'])->name('fetch.formcampaighall.details');
Route::resource('/formcampaighgive', FormcampaighgiveController::class);
// Line Push Evidence
Route::get('/pushevidence', [PushevidenceController::class, 'index'])->name('pushevidence.index');
Route::get('/pushevidence2', [PushevidenceController::class, 'index2'])->name('pushevidence2.index');
// Route::get('/pushevidence', [PushevidenceController::class, 'index'])->name('pushevidence.index');
Route::post('/pushevidencetouser', [PushevidenceController::class, 'pushevidencetouser'])->name('pushevidencetouser');
Route::get('/pin', [PinController::class, 'showForm'])->name('pin.form');
Route::post('/pin', [PinController::class, 'verifyPin'])->name('pin.verify');


// Super Admin
Route::get('/super-admin/dashboard', function () {
    return view('super-admin.dashboard');
})->middleware(['auth', 'verified', 'super-admin'])->name('super-admin.dashboard');
Route::middleware(['auth', 'verified', 'super-admin'])->prefix('super-admin')->name('super-admin.')->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::get('/api/dashboard-data', [DashboardController::class, 'getDashboardData'])->name('dashboard.data');
    Route::resource('/campaigns', CampaignController::class);
    Route::resource('/campaigns_transaction', CampaignTransactionController::class);
    Route::get('/campaigns_transaction_success', [CampaignTransactionController::class, 'success']);
    Route::resource('/campaign_transaction_complete', CampaignTransactionComplete::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/categoriesdetails', CategoriesdetailsController::class);
    Route::resource('/users', UserController::class);
    Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qr-code.index');
});

// Fetch API 
Route::get('/api/campaigns', [DashboardController::class, 'getActiveCampaigns']);
Route::get('/api/users', [DashboardController::class, 'getActiveuser']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// // เส้นทางสำหรับแสดงฟอร์ม QR Code
// Route::get('/qrcode', [QRCodeController::class, 'index'])->name('qr-code.index');

// เส้นทางสำหรับสร้าง QR Code
Route::post('/qr-code/generate', [QRCodeController::class, 'generate'])->name('qr-code.generate');
require __DIR__.'/auth.php';
