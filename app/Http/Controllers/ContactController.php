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
        $request->validate([
            'email' => 'nullable|email',
            'name' => 'nullable|string',
        ]);

        $type = $request->input('form_type', 'Demande');
        
        // Dynamic Recipient from CMS Settings
        $recipient = cms_setting('site.email.contact', 'contact@aric.ci');
        if (str_contains(strtolower($type), 'candidature') || str_contains(strtolower($type), 'recrutement')) {
            $recipient = cms_setting('site.email.recruitment', 'rh@aric.ci');
        }

        // Logic to send mail would go here, e.g.:
        // Mail::to($recipient)->send(new ContactFormMail($request->all()));
        
        return back()->with('success', "Votre {$type} a été reçue avec succès par nos services ({$recipient}). Nos équipes vous recontacteront sous 24h.");
    }
}
