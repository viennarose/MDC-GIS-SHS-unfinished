<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function appointments(){
        $appointments = Appointment::all();
        return view('admin.pages.appointments.appointments', compact('appointments'));
    }

public function store(Request $request, Appointment $appointment)
{
    try {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'reason' => 'required|string',
        ]);

        $appointment->fullname = $validatedData['fullname'];
        $appointment->user_id = Auth::id();
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();

        return redirect()->route('appointments.store')->with('success', 'Appointment created successfully.');
    } catch (\Exception $e) {
        // Handle exceptions here (e.g., log the error)
        return redirect()->back()->with('error', 'An error occurred while creating the appointment.');
    }
}


    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.update', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'reason' => 'required|string',
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->name = $validatedData['name'];
        $appointment->date = $validatedData['date'];
        $appointment->time = $validatedData['time'];
        $appointment->reason = $validatedData['reason'];
        $appointment->save();

        return redirect()->route('admin.pages.appointments.appointments')->with('success', 'Appointment updated successfully.');
    }


    public function destroy($id)
    {
        $appt = Appointment::findOrFail($id);
        $appt->delete();
        return redirect()->route('admin.pages.appointments.appointments')->with('success', 'Task deleted successfully.');
    }

}
