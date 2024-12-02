<?php 

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;


Route::post('/webhook', [ApiController::class, 'handleWebhook']);
