<?php

namespace App\Http\Controllers\Admin;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAnnouncementController extends Controller
{
    public function announcements()
    {
        $count = Announcement::count();
        $announcements = Announcement::orderBy('id', 'asc')->paginate(10);

        return view('admin.pages.announcements.announcement', compact('announcements', 'count'));
    }

    public function store(Request $request, announcement $announcement)
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
            $image->move(public_path('announcements'), $imageName);

            $announcement->image = $imageName;

        }
        $announcement->title = $validatedData['title'];
        $announcement->user_id = Auth::id();
        $announcement->description = $validatedData['description'];
        $announcement->save();

        return redirect()->route('announcements.store')->with('success', 'Announcement created successfully.');
    } catch (\Exception $e) {
        Log::error('An error occurred while creating the announcement: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());
        return redirect()->back()->with('error', 'An error occurred while creating the announcement.');
    }
}


    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('announcements.update', compact('announcement'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required|string',
    ]);

    $announcement = Announcement::findOrFail($id);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('announcements'), $imageName);


        if ($announcement->image) {
            $oldImagePath = public_path('announcements') . '/' . $announcement->image;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $announcement->image = $imageName;
    }

    $announcement->title = $validatedData['title'];
    $announcement->description = $validatedData['description'];
    $announcement->save();

    return redirect()->route('announcements.announcements')->with('success', 'Announcement updated successfully.');
}



    public function destroy($id)
    {
        $act = Announcement::findOrFail($id);
        $act->delete();
        return redirect()->route('announcements.announcements')->with('success', 'Announcement deleted successfully.');
    }
}
