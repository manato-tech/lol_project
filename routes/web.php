<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LolController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageAnalysisController;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\DeepSeekController;


use App\Http\Controllers\ChampionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/champion-guide', [ChampionController::class, 'getGuide']);
Route::get('/deepseek/champion-guide', [DeepSeekController::class, 'getChampionGuide'])->name('deepseek.champion-guide');
Route::post('/deepseek/guide', [DeepSeekController::class, 'getGuide'])->name('deepseek.guide');

//名前はべつにしないといかんらしい
Route::get('/scrape', [ScraperController::class, 'getScrapedData'])->name('scrape.data');
Route::get('/scrape/blonze', [ScraperController::class, 'getScrapedData_blonze'])->name('scrape.data_blonze');
Route::get('/scrape/silver', [ScraperController::class, 'getScrapedData_silver'])->name('scrape.data_silver');
Route::get('/scrape/gold', [ScraperController::class, 'getScrapedData_gold'])->name('scrape.data_gold');

Route::get('/scrape/lola/iron', [ScraperController::class, 'getScrapedData_lola_iron'])->name('scrape.data_lola_iron');
Route::get('/scrape/lola/blonze', [ScraperController::class, 'getScrapedData_lola_blonze'])->name('scrape.data_lola_blonze');
Route::get('/scrape/lola/silver', [ScraperController::class, 'getScrapedData_lola_silver'])->name('scrape.data_lola_silver');
Route::get('/scrape/lola/gold', [ScraperController::class, 'getScrapedData_lola_gold'])->name('scrape.data_lola_gold');

Route::get('/post/lol', [LolController::class, 'lol'])->name('lol.lol');

Route::get('/champion-guide', [ChampionController::class, 'getGuide']);

require __DIR__.'/auth.php';
