<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    protected $contentService;

    public function __construct(\App\Services\ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    public function history(Request $request)
    {
        $history = $this->contentService->getRecentHistory();

        return response()->json([
            'success' => true,
            'data' => $history,
        ]);
    }

    public function setMode(Request $request)
    {
        $request->validate(['mode' => 'required|in:preview,live']);

        $mode = $this->contentService->setPreviewMode($request->mode);

        return response()->json([
            'success' => true,
            'mode' => $mode,
        ]);
    }

    public function updateDraft(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value' => 'required|string',
        ]);

        $draft = $this->contentService->updateDraft($request->key, $request->value);

        return response()->json([
            'success' => true,
            'message' => 'Brouillon sauvegardé',
            'data' => $draft,
        ]);
    }

    public function publish(Request $request)
    {
        $count = $this->contentService->publishAll();

        return response()->json([
            'success' => true,
            'message' => "{$count} modifications publiées avec succès",
        ]);
    }

    public function rollback(Request $request)
    {
        $request->validate(['version_id' => 'required|integer']);

        $this->contentService->rollbackToVersion($request->version_id);

        return response()->json([
            'success' => true,
            'message' => 'Restauration effectuée',
        ]);
    }

    public function reorderSections(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'direction' => 'required|in:up,down',
            'page' => 'required|string',
        ]);

        $section = \App\Models\Section::where('page', $request->page)
            ->where('key', $request->key)
            ->firstOrFail();
        $targetOrder = $request->direction === 'up' ? $section->order - 11 : $section->order + 11;
        // Perform basic reordering logic
        $section->update(['order' => $targetOrder]);

        // Re-normalize orders to keep them clean (10, 20, 30...)
        /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Section[] $sections */
        $sections = \App\Models\Section::where('page', $section->page)
            ->orderBy('order')
            ->get();

        foreach ($sections as $index => $s) {
            /** @var \App\Models\Section $s */
            $s->update(['order' => ($index + 1) * 10]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sections réordonnées avec succès',
        ]);
    }
}
