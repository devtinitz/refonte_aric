<?php

if (!function_exists('cms_setting')) {
    /**
     * Get a CMS setting value by key.
     */
    function cms_setting($key, $default = null)
    {
        try {
            $content = \App\Models\Content::where('key', $key)->first();
            if ($content) {
                // Check if we are in preview mode
                $mode = session('cms_mode', 'live');
                
                if ($mode === 'preview') {
                    return $content->current_display_value?->value ?? $default;
                }
                
                return $content->publishedValue?->value ?? $default;
            }
        } catch (\Exception $e) {
            // Fallback
        }
        return $default;
    }
}
