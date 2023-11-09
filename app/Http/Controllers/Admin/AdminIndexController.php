<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Feedback;
use App\Models\Appointment;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countA = Announcement::count();
        $countM = Contact::count();
        $countAct = Activity::count();
        $countF = Feedback::count();
        $countAppt = Appointment::count();
        $countUsers = User::count();
        return view('admin.pages.dashboard', compact('countA', 'countM', 'countAct', 'countF', 'countAppt', 'countUsers' ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
