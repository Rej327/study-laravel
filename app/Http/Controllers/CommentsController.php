<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all comments
        $comments = Comments::with(['user', 'photo'])->latest()->get();

        // Return the view with comments
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new comment
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
            'comment' => 'required|string|max:500',
        ]);

        // Create a new comment
        $comment = new Comments();
        $comment->user_id = auth()->id();
        $comment->photo_id = $request->photo_id;
        $comment->comment = $request->comment;
        $comment->save();

        // Redirect back with success message
      return redirect()->route('photos.show', $request->photo_id)->with('success', 'Comment added successfully.');

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
        // Find the comment by ID
        $comment = Comments::findOrFail($id);

        // Check if the authenticated user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        // Delete the comment
        $comment->delete();

        // Redirect back with success message
        return redirect()->route('photos')->with('success', 'Comment deleted successfully.');
    }
}
