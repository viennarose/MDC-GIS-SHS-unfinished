<?php

namespace App\Http\Controllers\Admin\Questionnaires;

use PDF;
use App\Models\Readmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReadmissionController extends Controller
{
    public function readmission()
    {
        $count = Readmission::count();
        $readmissions = Readmission::orderBy('id', 'asc')->paginate(10);

        return view('admin.pages.questionnaires.readmission.readmission', compact('readmissions', 'count'));
    }

    public function readmissionCreate()
    {
        return view('admin.pages.questionnaires.readmission.readmission-create');
    }

    public function readmissionstore(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'course_year' => 'required|string',
            'date1' => 'nullable|string',
            'reason1' => 'nullable|string',
            'subject_affected1' => 'nullable|string',
            'date2' => 'nullable|string',
            'reason2' => 'nullable|string',
            'subject_affected2' => 'nullable|string',
            'date3' => 'nullable|string',
            'reason3' => 'nullable|string',
            'subject_affected3' => 'nullable|string',
            'granted' => 'required',
            'guidance_sig' => 'required|string',
            'osad_sig' => 'required|string',

        ]);

        Readmission::create([
            'user_id' => Auth::id(),
            'student_name' => $request->input('student_name'),
            'course_year' => $request->input('course_year'),
            'date1' => $request->input('date1'),
            'reason1' => $request->input('reason1'),
            'subject_affected1' => $request->input('subject_affected1'),
            'date2' => $request->input('date2'),
            'reason2' => $request->input('reason2'),
            'subject_affected2' => $request->input('subject_affected2'),
            'date3' => $request->input('date3'),
            'reason3' => $request->input('reason3'),
            'subject_affected3' => $request->input('subject_affected3'),
            'granted' => $request->input('granted'),
            'guidance_sig' => $request->input('guidance_sig'),
            'osad_sig' => $request->input('osad_sig'),


        ]);

        return redirect('/admin/readmission')->with('message', 'New readmission Added');
    }

    public function readmissionEdit($id)
    {
        $readmission = Readmission::findOrFail($id);
        return view('admin.pages.questionnaires.readmission.readmission-update', compact('readmission'));
    }

    public function readmissionUpdate(Request $request, $id)
{
    $readmission = Readmission::find($id);
    $readmission->update($request->all()); // Update the readmission record with the submitted data
    return redirect('/admin/readmission')->with('message', 'readmission Form Updated!'); // Redirect to the index page or a success page
}


public function destroy($id)
{
    $readmission = Readmission::findOrFail($id);
    $readmission->delete();
    return redirect('/admin/readmission')->with('message', 'readmission deleted successfully.');
}


public function downloadPDF($id) {
    $readmission = Readmission::findOrFail($id);

    $pdf = PDF::loadView('admin.pages.questionnaires.readmission.readmission-pdf', compact('readmission'));
    $pdf->setPaper('Letter', 'portrait');
    return $pdf->download('readmission_form.pdf');
}

public function printreadmission($id) {
    $readmission = Readmission::findOrFail($id);
    return view('admin.pages.questionnaires.readmission.readmission-pdf', compact('readmission'));
}
}
