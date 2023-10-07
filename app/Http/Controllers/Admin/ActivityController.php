<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityController extends Controller
{
    public function activities(){
        $activities = Activity::all();
        return view('admin.pages.activities.activities', compact('activities'));
    }

public function store(Request $request, Activity $activity)
{
    try {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('activities'), $imageName);

            $activity->image = $imageName;

        }
        $activity->title = $validatedData['title'];
        $activity->user_id = Auth::id();
        $activity->description = $validatedData['description'];
        $activity->save();

        return redirect()->route('activities.store')->with('success', 'Activity created successfully.');
    } catch (\Exception $e) {
        Log::error('An error occurred while creating the activity: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());
        return redirect()->back()->with('error', 'An error occurred while creating the activity.');
    }
}


    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.update', compact('activity'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
    ]);

    $activity = Activity::findOrFail($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('activities'), $imageName);


        if ($activity->image) {
            $oldImagePath = public_path('activities') . '/' . $activity->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $activity->image = $imageName;
    }

    $activity->title = $validatedData['title'];
    $activity->description = $validatedData['description'];
    $activity->save();

    return redirect()->route('activities.activities')->with('success', 'Activity updated successfully.');
}



    public function destroy($id)
    {
        $act = Activity::findOrFail($id);
        $act->delete();
        return redirect()->route('activities.activities')->with('success', 'Task deleted successfully.');
    }

}
