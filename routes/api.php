<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RotatorController;
use App\Http\Controllers\Api\LinkAktifController;

// Tambahkan resource route untuk API RotatorController
Route::apiResource('rotators', RotatorController::class);

Route::get('update-link-aktif', [LinkAktifController::class, 'updateLinkAktif']);