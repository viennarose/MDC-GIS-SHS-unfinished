<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function feedbacks(){
        $feedbacks = Feedback::all();
        return view('admin.pages.feedbacks', compact('feedbacks'));
    }
}
