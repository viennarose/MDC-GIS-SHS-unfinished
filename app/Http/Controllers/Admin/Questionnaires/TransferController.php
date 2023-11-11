<?php

namespace App\Http\Controllers\Admin\Questionnaires;

use PDF;
use Illuminate\Http\Request;
use App\Models\Questionnaire;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function transfer()
    {
        $count = Questionnaire::count();
        $transfers = Questionnaire::with('user')->orderBy('id', 'asc')->paginate(10);

        return view('admin.pages.questionnaires.transfer.transfer', compact('transfers', 'count'));
    }

    public function transferCreate()
    {
        return view('admin.pages.questionnaires.transfer.transfer-create');
    }

    public function transferstore(Request $request)
    {
        $request->validate([
            'last_semester' => 'required|string',
            'course_year' => 'required|string',
            'reason' => 'required|array',
            'other_reason' => 'required|string',
            'recommendations' => 'required|string',
            'transfer_school' => 'nullable|string',
            'transfer_school_address' => 'nullable|string',

        ]);

        $reason = implode(', ', $request->input('reason'));
        Questionnaire::create([
            'user_id' => Auth::id(),
            'last_semester' => $request->input('last_semester'),
            'course_year' => $request->input('course_year'),
            'reason' => $reason,
            'other_reason' => $request->input('other_reason'),
            'recommendations' => $request->input('recommendations'),
            'transfer_school' => $request->input('transfer_school'),
            'transfer_school_address' => $request->input('transfer_school_address'),
        ]);

        return redirect('/admin/transfer')->with('message', 'New transfer Added');
    }


    public function transferEdit($id)
    {
        $transfer = Questionnaire::findOrFail($id);
        return view('admin.pages.questionnaires.transfer.transfer-update', compact('transfer'));
    }

    public function transferUpdate(Request $request, $id)
{
    $transfer = Questionnaire::find($id);
    $transfer->update($request->all()); // Update the transfer record with the submitted data
    return redirect('/admin/transfer')->with('message', 'transfer Form Updated!'); // Redirect to the index page or a success page
}


public function destroy($id)
{
    $transfer = Questionnaire::findOrFail($id);
    $transfer->delete();
    return redirect('/admin/transfer')->with('message', 'transfer deleted successfully.');
}


public function downloadPDF($id) {
    $transfer = Questionnaire::findOrFail($id);

    $pdf = PDF::loadView('admin.pages.questionnaires.transfer.transfer-pdf', compact('transfer'));
    $pdf->setPaper('Letter', 'portrait');
    return $pdf->download('transfer_form.pdf');
}

public function printtransfer($id) {
    $transfer = Questionnaire::findOrFail($id);
    return view('admin.pages.questionnaires.transfer.transfer-pdf', compact('transfer'));
}
}
