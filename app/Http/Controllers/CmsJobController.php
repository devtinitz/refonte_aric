<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Illuminate\Http\Request;

class CmsJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobOffer::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('cms.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.jobs.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'contract_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        JobOffer::create($validated);

        return redirect()->route('cms.jobs.index')->with('success', 'Offre d\'emploi créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobOffer $job)
    {
        return view('cms.jobs.form', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'contract_type' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $job->update($validated);

        return redirect()->route('cms.jobs.index')->with('success', 'Offre d\'emploi mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $job)
    {
        $job->delete();
        return redirect()->route('cms.jobs.index')->with('success', 'Offre d\'emploi supprimée.');
    }

    /**
     * Update the order of jobs.
     */
    public function reorder(Request $request)
    {
        $orders = $request->input('orders');
        foreach ($orders as $id => $order) {
            JobOffer::where('id', $id)->update(['order' => $order]);
        }
        return response()->json(['success' => true]);
    }
}
