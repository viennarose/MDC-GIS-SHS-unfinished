<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcement()
    {
        $count = Announcement::count();
        $announcements = Announcement::orderBy('id', 'asc')->paginate(10);

        return view('admin.pages.announcement', compact('announcements', 'count'));
    }

}
