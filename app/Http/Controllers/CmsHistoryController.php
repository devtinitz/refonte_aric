<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use Illuminate\Http\Request;

class CmsHistoryController extends Controller
{
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display the full history audit page.
     */
    public function index()
    {
        $history = $this->contentService->getRecentHistory(50); // Get more history for the full page
        return view('cms.history.index', compact('history'));
    }

    /**
     * Revert a content item to a previous version.
     */
    public function rollback(Request $request)
    {
        $request->validate([
            'version_id' => 'required|integer|exists:content_values,id',
        ]);

        try {
            $this->contentService->rollbackToVersion($request->version_id);
            return response()->json([
                'success' => true,
                'message' => 'Version restaurée en mode brouillon.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la restauration : ' . $e->getMessage(),
            ], 500);
        }
    }
}
