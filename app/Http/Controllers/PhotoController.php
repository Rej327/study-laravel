<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        // If you want to pass comments to the view, you can do so like this:
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }

    public function show(Photo $photo)
    {
        $photo->load('comments.user'); 
        return view('photos.show', compact('photo'));
    }

     public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique file name
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store the file in the 'public/photos' directory
            $path = $image->storeAs('photos', $imageName, 'public');

            // Save photo info to database
            $photo = new Photo();
            $photo->title = $request->title;
            $photo->image_path = $path; // store relative path
            $photo->user_id = auth()->id();
            $photo->save();

            return redirect()->route('photos')->with('success', 'Photo uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Please select an image to upload.');
    }

    public function destroy(Photo $photo)
    {
        Storage::disk('public')->delete($photo->id);
        $photo->delete();

        return redirect()->route('photos')->with('success', 'Photo deleted.');
    }
}
