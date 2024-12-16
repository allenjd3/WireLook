<?php

use Allenjd3\WireLook\Middleware\LocalOnly;
use Illuminate\Support\Facades\Route;

Route::get('/wirelook', fn() => 'hello world')->middleware(LocalOnly::class);

