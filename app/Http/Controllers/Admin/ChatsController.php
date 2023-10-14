<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ChatsController extends Controller
{
    public function chats(){
        return view('admin.pages.ongoing');
    }
}
