<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index (){


        return view('admin.notification');
    }




    public function read(){

        foreach (auth()->user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back()->with(['toast_success' => 'All read it']);

    }
}
