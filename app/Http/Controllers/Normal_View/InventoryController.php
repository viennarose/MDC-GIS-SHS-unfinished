<?php

namespace App\Http\Controllers\Normal_View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('normal-view.pages.inventory');
    }
    public function storeandupdate(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'date' => 'required|string',
            'course_year' => 'required|string',
            'department' => 'required|string',
            'contact_num' => 'required|string',
            'visit_nature' => 'required|string',
            'concern' => 'required|string',
            'action_taken' => 'required|string',
            'followup_dates' => 'required|string',
            'counselee' => 'required|string',
            'counselor' => 'required|string',
            'session_ended' => 'required|string',
        ]);

        CounselingForm::create([
            'user_id' => Auth::id(),
            'student_name' => $request->input('student_name'),
            'date' => $request->input('date'),
            'course_year' => $request->input('course_year'),
            'department' => $request->input('department'),
            'contact_num' => $request->input('contact_num'),
            'visit_nature' => $request->input('visit_nature'),
            'concern' => $request->input('concern'),
            'action_taken' => $request->input('action_taken'),
            'followup_dates' => $request->input('followup_dates'),
            'counselee' => $request->input('counselee'),
            'counselor' => $request->input('counselor'),
            'session_ended' => $request->input('session_ended'),

        ]);

        return redirect('/admin/counseling')->with('message', 'New counseling Added');
    }
}
