<?php

use Allenjd3\WireLook\Controllers\WireLookController;
use Allenjd3\WireLook\Middleware\LocalOnly;
use Illuminate\Support\Facades\Route;

Route::get('/wirelook', WireLookController::class)->middleware(LocalOnly::class)->middleware(['web'])->name('wirelook');
