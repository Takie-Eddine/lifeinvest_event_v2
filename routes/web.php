<?php


use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\WinnerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    
  
    Route::group(['prefix' => 'investor'], function () {
        Route::get('/', [InvestorController::class, 'index'])->name('investor.index');
        Route::post('create', [InvestorController::class, 'create'])->name('investor.create');
        Route::post('get-cities-by-country',[InvestorController::class,'getCity'])->name('get-cities-by-country');
        Route::get('policies', [InvestorController::class, 'policies'])->name('investor.policies');

    });

    Route::group(['prefix' => 'participant'], function () {
        Route::get('/', [ParticipantController::class, 'index'])->name('participant.index');
        Route::post('create', [ParticipantController::class, 'create'])->name('participant.create');
        
    Route::get('policies', [ParticipantController::class, 'policies'])->name('participant.policies');
        });
    
    Route::group(['prefix' => 'person'], function () {
        Route::get('/', [PeopleController::class, 'index'])->name('person.index');
        Route::post('create', [PeopleController::class, 'create'])->name('person.create');
    });
    
    Route::get('/winner' ,[WinnerController::class, 'index'])->name('winner');
    
      Route::group(['prefix' => 'event'], function () {
        Route::get('/', [EventController::class, 'index'])->name('event.index');
        Route::post('create', [EventController::class, 'create'])->name('event.create');
    });
});
