<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Language switch route
Route::get('language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

require __DIR__.'/auth.php';
