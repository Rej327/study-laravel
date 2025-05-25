<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'nullable|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dummy = Dummy::create($validated);
        return response()->json($dummy, 201);
    }

    public function view(Dummy $dummy)
    {
        return view('dummy.show', compact('dummy'));
    }

    public function update(Request $request, Dummy $dummy)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'name' => 'nullable|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dummy->update($validated);
        return response()->json($dummy);
    }

    public function destroy(Dummy $dummy)
    {
        $dummy->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
