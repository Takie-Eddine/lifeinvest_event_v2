<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DarAlNashrController;
use App\Http\Controllers\Admin\EventBookController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ParticipantController  ;
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


    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
    });


    Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'],function(){

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'participant'],function(){
            Route::get('/' , [ParticipantController::class , 'index'])->name('admin.participant.index');
            Route::get('/deleteparticipant/{id}' , [ParticipantController::class , 'delete'])->name('admin.participant.delete');
            Route::get('/export' , [ParticipantController::class , 'exportods'])->name('admin.participant.exportods');
            Route::get('/export1' , [ParticipantController::class , 'exportcls'])->name('admin.participant.exportcls');
            Route::get('/export2' , [ParticipantController::class , 'exportxls'])->name('admin.participant.exportxls');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'investor'],function(){
            Route::get('/' , [InvestorController::class , 'index'])->name('admin.investor.index');
            Route::get('/deleteinvestor/{id}' , [InvestorController::class , 'delete'])->name('admin.investor.delete');
            Route::post('/update/{id}' , [InvestorController::class , 'edit'])->name('admin.investor.edit');
            Route::get('/export' , [InvestorController::class , 'exportods'])->name('admin.investor.exportods');
            Route::get('/export1' , [InvestorController::class , 'exportcls'])->name('admin.investor.exportcls');
            Route::get('/export2' , [InvestorController::class , 'exportxls'])->name('admin.investor.exportxls');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'winner'],function(){
            Route::get('/' , [EventBookController::class , 'index'])->name('admin.winner.index');
            Route::get('/delete/{id}' , [EventBookController::class , 'delete'])->name('admin.winner.delete');
            Route::get('/export' , [EventBookController::class , 'exportods'])->name('admin.winner.exportods');
            Route::get('/export1' , [EventBookController::class , 'exportcls'])->name('admin.winner.exportcls');
            Route::get('/export2' , [EventBookController::class , 'exportxls'])->name('admin.winner.exportxls');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'leads'],function(){
            Route::get('/' , [LeadController::class , 'index'])->name('admin.leads.index');
            Route::get('/delete/{id}' , [LeadController::class , 'delete'])->name('admin.leads.delete');
            Route::get('/export' , [LeadController::class , 'exportods'])->name('admin.leads.exportods');
            Route::get('/export1' , [LeadController::class , 'exportcls'])->name('admin.leads.exportcls');
            Route::get('/export2' , [LeadController::class , 'exportxls'])->name('admin.leads.exportxls');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'dar-al-nashr'],function(){
            Route::get('/' , [DarAlNashrController::class , 'index'])->name('admin.dar-al-nashr.index');
            Route::post('/store' , [DarAlNashrController::class , 'store'])->name('admin.dar-al-nashr.store');
            Route::get('/delete/{id}' , [DarAlNashrController::class , 'delete'])->name('admin.dar-al-nashr.delete');
            Route::get('/export' , [DarAlNashrController::class , 'exportods'])->name('admin.dar-al-nashr.exportods');
            Route::get('/export1' , [DarAlNashrController::class , 'exportcls'])->name('admin.dar-al-nashr.exportcls');
            Route::get('/export2' , [DarAlNashrController::class , 'exportxls'])->name('admin.dar-al-nashr.exportxls');

        });


        Route::get('notification', [NotificationController::class, 'index'])->name('admin.notification');
        Route::get('notification/read', [NotificationController::class, 'read'])->name('admin.notification.read');



        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    });
