<?php

namespace App\Http\Controllers\Normal_View;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class NormalActivityController extends Controller
{
    public function activities()
    {
        $activities = Activity::orderBy('id', 'desc')->paginate(5);

        return view('normal-view.pages.activity', compact('activities'));
    }
}
