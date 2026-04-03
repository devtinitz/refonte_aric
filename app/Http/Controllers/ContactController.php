<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle generic site-wide form submissions (Simulation).
     */
    public function submit(Request $request)
    {
        // For simulation, we just validate that we have some data
        $request->validate([
            'email' => 'nullable|email',
            'name' => 'nullable|string',
        ]);

        // In a real scenario, we would use Mail::send() or Save to DB here.
        // For now, we just redirect back with a success message.
        
        $type = $request->input('form_type', 'Demande');
        
        return back()->with('success', "Votre {$type} a été reçue avec succès. Nos équipes vous recontacteront sous 24h.");
    }
}
