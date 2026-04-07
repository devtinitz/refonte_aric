<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;

class CmsSettingsController extends Controller
{
    protected $contentService;

    // Defined setting keys
    protected $settingKeys = [
        'site.phone',
        'site.email.contact',
        'site.email.recruitment',
        'site.address',
        'site.social.facebook',
        'site.social.linkedin',
        'site.social.instagram',
        'site.social.twitter',
    ];

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = $this->contentService->getSettings($this->settingKeys);
        return view('cms.settings.index', compact('settings'));
    }

    /**
     * Update site-wide settings.
     */
    public function update(Request $request)
    {
        $data = $request->only($this->settingKeys);

        foreach ($data as $key => $value) {
            // Only update if the key is in our allowed list
            if (in_array($key, $this->settingKeys)) {
                $this->contentService->updateDraft($key, $value ?: '');
            }
        }

        return back()->with('success', 'Paramètres mis à jour en mode brouillon. N\'oubliez pas de publier pour rendre les changements visibles.');
    }
}
