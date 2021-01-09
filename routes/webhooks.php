<?php

use App\Http\Controllers\Webhooks\MollieWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/mollie', MollieWebhookController::class)->name('webhooks.mollie');

