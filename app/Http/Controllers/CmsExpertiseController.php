<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;

class CmsExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expertises = Expertise::orderBy('order')->get();
        return view('cms.expertises.index', compact('expertises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.expertises.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        $maxOrder = Expertise::max('order') ?? -1;
        $validated['order'] = $maxOrder + 1;

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('expertises', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        Expertise::create($validated);

        return redirect()->route('cms.expertises.index')->with('success', 'Expertise ajoutée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expertise $expertise)
    {
        return view('cms.expertises.form', compact('expertise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expertise $expertise)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image_file')) {
            // Delete old image
            if ($expertise->image && str_contains($expertise->image, '/storage/expertises/')) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete(str_replace('/storage/', '', $expertise->image));
            }
            $path = $request->file('image_file')->store('expertises', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $expertise->update($validated);

        return redirect()->route('cms.expertises.index')->with('success', 'Expertise mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expertise $expertise)
    {
        $expertise->delete();
        return redirect()->route('cms.expertises.index')->with('success', 'Expertise supprimée.');
    }

    /**
     * Reorder the resources.
     */
    public function reorder(Request $request)
    {
        $order = $request->input('order');
        foreach ($order as $index => $id) {
            Expertise::where('id', $id)->update(['order' => $index]);
        }
        return response()->json(['success' => true]);
    }
}
