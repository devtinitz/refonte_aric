<?php

namespace App\Services;

use App\Models\Content;
use App\Models\ContentValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContentService
{
    /**
     * Update or create a draft for a content key.
     */
    public function updateDraft(string $key, string $value)
    {
        return DB::transaction(function () use ($key, $value) {
            $content = Content::firstOrCreate(['key' => $key]);

            $latestVersion = ContentValue::where('content_id', $content->id)
                ->max('version_number') ?? 0;

            /** @var ContentValue|null $draft */
            $draft = ContentValue::where('content_id', $content->id)
                ->where('status', 'draft')
                ->first();

            if ($draft) {
                $draft->update(['value' => $value]);
                return $draft;
            }

            return ContentValue::create([
                'content_id' => $content->id,
                'value' => $value,
                'status' => 'draft',
                'version_number' => $latestVersion + 1,
                'user_id' => Auth::id(),
            ]);
        });
    }

    /**
     * Publish all pending drafts in a single transaction.
     */
    public function publishAll()
    {
        return DB::transaction(function () {
            $drafts = ContentValue::where('status', 'draft')->get();

            foreach ($drafts as $draft) {
                // Archive the current published version for this specific content
                ContentValue::where('content_id', $draft->content_id)
                    ->where('status', 'published')
                    ->update(['status' => 'archived']);
                
                // Promote the draft to published
                $draft->update(['status' => 'published']);
            }

            return $drafts->count();
        });
    }
    
    /**
     * Rollback to a specific version.
     */
    public function rollbackToVersion(int $versionId)
    {
        return DB::transaction(function () use ($versionId) {
            $valueToRestore = ContentValue::findOrFail($versionId);
            
            // Create a new draft from this version, preserving the audit trail
            return $this->updateDraft($valueToRestore->content->key, $valueToRestore->value);
        });
    }

    /**
     * Get recent modifications history.
     */
    public function getRecentHistory(int $limit = 20)
    {
        return ContentValue::with(['content', 'user'])
            ->whereIn('status', ['published', 'archived'])
            ->latest('created_at')
            ->limit($limit)
            ->get();
    }

    /**
     * Get a set of settings by their keys.
     */
    public function getSettings(array $keys)
    {
        $settings = [];
        foreach ($keys as $key) {
            $content = Content::where('key', $key)->first();
            $settings[$key] = $content ? $content->current_display_value?->value : null;
        }
        return $settings;
    }

    /**
     * Set the current view mode (preview/live) in session.
     */
    public function setPreviewMode(string $mode)
    {
        session(['cms_mode' => $mode]);
        return $mode;
    }
}
