<?php

namespace App\Http\Controllers\Admin\Questionnaires;

use PDF;
use Illuminate\Http\Request;
use App\Models\CounselingForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CounselingController extends Controller
{
    public function counseling()
    {
        $count = CounselingForm::count();
        $counselings = CounselingForm::orderBy('id', 'asc')->paginate(10);

        return view('admin.pages.questionnaires.counseling', compact('counselings', 'count'));
    }

    public function counselingCreate()
    {
        return view('admin.pages.questionnaires.counseling-create');
    }

    public function counselingStore(Request $request)
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

    public function counselingEdit($id)
    {
        $counseling = CounselingForm::findOrFail($id);
        return view('admin.pages.questionnaires.counseling-update', compact('counseling'));
    }

    public function counselingUpdate(Request $request, $id)
{
    $counseling = CounselingForm::find($id);
    $counseling->update($request->all()); // Update the counseling record with the submitted data
    return redirect('/admin/counseling')->with('message', 'Counseling Form Updated!'); // Redirect to the index page or a success page
}


public function destroy($id)
{
    $counseling = CounselingForm::findOrFail($id);
    $counseling->delete();
    return redirect('/admin/counseling')->with('message', 'Counseling deleted successfully.');
}


public function downloadPDF($id) {
    $counseling = CounselingForm::findOrFail($id);

    $pdf = PDF::loadView('admin.pages.questionnaires.counseling-pdf', compact('counseling'));
    $pdf->setPaper('Letter', 'portrait');
    return $pdf->download('counseling_form.pdf');
}

public function printCounseling($id) {
    $counseling = CounselingForm::findOrFail($id);
    return view('admin.pages.questionnaires.counseling-pdf', compact('counseling'));
}
}
