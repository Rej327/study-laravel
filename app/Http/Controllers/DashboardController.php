<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
   {
        $query = Dummy::with('user');

       if($request->filled('search')) {
           $search = $request->input('search');
           $query->where(function($q) use ($search) {
               $q->where('title', 'like', '%' . $search . '%')
                 ->orWhere('description', 'like', '%' . $search . '%');
           });  
       }

        $sortBy = $request->input('sort_by', 'title');
        $sortOrder = $request->input('sort_order', 'asc');

        if (in_array($sortBy, ['title', 'description']) && in_array($sortOrder, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->orderBy('title', 'asc'); // Default sorting
        }

        $dummies = $query->get();
        return view('dashboard', compact('dummies'));
    }

    public function create()
    {
        return view('dummy.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([          
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dummy = Dummy::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('dashboard')->with('success', 'Dummy created successfully');
        // return response()->json($dummy, 201);
    }

    public function update(Dummy $dummy)
    {
        return view('dummy.update', compact('dummy'));
    }   

    public function save(Request $request, Dummy $dummy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $dummy->update($validated);
        return redirect()->route('dashboard')->with('success', 'Dummy updated successfully');

    }

    public function show(Dummy $dummy)
    {
        return view('dummy.show', compact('dummy'));
    }

    public function destroy(Dummy $dummy)
    {
        $dummy->delete();
        return redirect()->route('dashboard')->with('success', 'Dummy deleted successfully');
    }
}
