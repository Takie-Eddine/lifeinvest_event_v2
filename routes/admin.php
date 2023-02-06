<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DarAlNashrController;
use App\Http\Controllers\Admin\EventBookController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NewlifeLeadController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ParticipantController  ;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;

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

        Route::group(['namespace' => 'Admin', 'middleware' => 'can:participant', 'prefix' => 'participant'],function(){
            Route::get('/' , [ParticipantController::class , 'index'])->name('admin.participant.index');
            Route::get('/deleteparticipant/{id}' , [ParticipantController::class , 'delete'])->name('admin.participant.delete');
            Route::post('/export' , [ParticipantController::class , 'exportods'])->name('admin.participant.exportods');
            // Route::get('/export1' , [ParticipantController::class , 'exportcls'])->name('admin.participant.exportcls');
            // Route::get('/export2' , [ParticipantController::class , 'exportxls'])->name('admin.participant.exportxls');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'can:investor', 'prefix' => 'investor'],function(){
            Route::get('/' , [InvestorController::class , 'index'])->name('admin.investor.index');
            Route::get('/deleteinvestor/{id}' , [InvestorController::class , 'delete'])->name('admin.investor.delete');
            Route::post('/update/{id}' , [InvestorController::class , 'edit'])->name('admin.investor.edit');
            Route::post('/export' , [InvestorController::class , 'exportods'])->name('admin.investor.exportods');
            // Route::get('/export1' , [InvestorController::class , 'exportcls'])->name('admin.investor.exportcls');
            // Route::get('/export2' , [InvestorController::class , 'exportxls'])->name('admin.investor.exportxls');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'can:winner', 'prefix' => 'winner'],function(){
            Route::get('/' , [EventBookController::class , 'index'])->name('admin.winner.index');
            Route::get('/delete/{id}' , [EventBookController::class , 'delete'])->name('admin.winner.delete');
            Route::get('/export' , [EventBookController::class , 'exportods'])->name('admin.winner.exportods');
            Route::get('/export1' , [EventBookController::class , 'exportcls'])->name('admin.winner.exportcls');
            Route::get('/export2' , [EventBookController::class , 'exportxls'])->name('admin.winner.exportxls');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'can:leads', 'prefix' => 'leads'],function(){
            Route::get('/' , [LeadController::class , 'index'])->name('admin.leads.index');
            Route::get('/delete/{id}' , [LeadController::class , 'delete'])->name('admin.leads.delete');
            Route::post('/export' , [LeadController::class , 'exportods'])->name('admin.leads.exportods');
            Route::post('/export1' , [LeadController::class , 'exportcls'])->name('admin.leads.exportcls');
            Route::post('/export2' , [LeadController::class , 'exportxls'])->name('admin.leads.exportxls');
            Route::get('/trash',[LeadController::class, 'trash'])->name('admin.leads.trash');
            Route::get('/{category}/restore',[LeadController::class, 'restore'])->name('admin.leads.restore');
            Route::get('/{category}/force-delete',[LeadController::class, 'forceDelete'])->name('admin.leads.force-delete');
            Route::post('/delete-multiple' , [LeadController::class , 'multipleDelete'])->name('admin.leads.deletemultiple');

        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'can:dar-al-nashr', 'prefix' => 'dar-al-nashr'],function(){
            Route::get('/' , [DarAlNashrController::class , 'index'])->name('admin.dar-al-nashr.index');
            Route::post('/store' , [DarAlNashrController::class , 'store'])->name('admin.dar-al-nashr.store');
            Route::get('/delete/{id}' , [DarAlNashrController::class , 'delete'])->name('admin.dar-al-nashr.delete');
            Route::get('/export' , [DarAlNashrController::class , 'exportods'])->name('admin.dar-al-nashr.exportods');
            Route::get('/export1' , [DarAlNashrController::class , 'exportcls'])->name('admin.dar-al-nashr.exportcls');
            Route::get('/export2' , [DarAlNashrController::class , 'exportxls'])->name('admin.dar-al-nashr.exportxls');

        });



        Route::group(['namespace' => 'Admin', 'middleware' => 'can:notification', 'prefix' => 'notification'],function(){
            Route::get('/', [NotificationController::class, 'index'])->name('admin.notification');
            Route::get('/read', [NotificationController::class, 'read'])->name('admin.notification.read');
        });




        Route::group(['namespace' => 'Admin', 'middleware' => 'can:users', 'prefix' => 'users'],function(){
            Route::get('/' , [UserController::class , 'index'])->name('admin.users.index');
            Route::get('/create' , [UserController::class , 'create'])->name('admin.users.create');
            Route::post('/store' , [UserController::class , 'store'])->name('admin.users.store');
            Route::get('/edit/{id}' , [UserController::class , 'edit'])->name('admin.users.edit');
            Route::get('/update/{id}' , [UserController::class , 'update'])->name('admin.users.update');
            Route::get('/delete/{id}' , [UserController::class , 'delete'])->name('admin.users.delete');
        });


        Route::group(['namespace' => 'Admin', 'middleware' => 'can:permission', 'prefix' => 'permission'],function(){
            Route::get('/' , [PermissionController::class , 'index'])->name('admin.permission.index');
            Route::post('/store' , [PermissionController::class , 'store'])->name('admin.permission.store');
            Route::get('/delete/{id}' , [PermissionController::class , 'delete'])->name('admin.permission.delete');
        });

        Route::group(['namespace' => 'Admin', 'middleware' => 'can:newlife', 'prefix' => 'newlife'],function(){
            Route::get('/' , [NewlifeLeadController::class , 'index'])->name('admin.newlife.index');
        });


        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    });
