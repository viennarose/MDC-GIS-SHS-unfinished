<?php

namespace App\Http\Controllers\Normal_View;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetAppointmentController extends Controller
{
    public function setAppointment(){
        return view('normal-view.pages.appointment');
    }

    public function store(Request $request, Appointment $appointment)
{
    try {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'date' => 'required|string',
            'time' => 'required|string',
            'reason' => 'required|string',
        ]);

        $appointment->fullname = $validatedData['fullname'];
        $appointment->user_id = Auth::id();
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();

        return view('normal-view.pages.confirmation');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the appointment.');
    }
}
}
