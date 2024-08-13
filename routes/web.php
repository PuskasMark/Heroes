<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;
use App\Models\Contest;
use App\Models\Character;

Route::get('/', function () {
    $charaters_count = Character::Count();
    $contests_count = Contest::Count();
    return view('fooldal.fooldal',['charaters_count'=>$charaters_count, 'contests_count'=>$contests_count]);
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('characters', CharacterController::class);
    Route::resource('places', PlaceController::class);
    Route::resource('contest', ContestController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
