<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index(Request $request)
    {
        $ideas = Idea::when($request->search, function($query) use ($request) {
                    return $query->search($request->search);
                })
                ->orderBy('priority_level', 'desc')
                ->Paginate(10);

        return view('ideas.index', compact('ideas'));
    }

    public function create()
    {
        return view('ideas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'description' => 'required',
            'priority_level' => 'required|integer|between:1,5'
        ]);

        Idea::create($validated);

        return redirect()->route('ideas.index')
            ->with('success', 'Idea created successfully.');
    }

    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact('idea'));
    }

    public function update(Request $request, Idea $idea)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'description' => 'required',
            'priority_level' => 'required|integer|between:1,5'
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.index')
            ->with('success', 'Idea updated successfully.');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('ideas.index')
            ->with('success', 'Idea deleted successfully.');
    }
}
