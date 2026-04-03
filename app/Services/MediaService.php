<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaService
{
    /**
     * Store and optionally resize a file.
     */
    public function upload(UploadedFile $file, string $disk = 'public')
    {
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('cms/media', $filename, $disk);

        // Placeholder for resizing logic (e.g. using Intervention Image)
        // In a real 'Pro' app, we'd use a queue or a dedicated service.
        
        return [
            'url' => Storage::url($path),
            'path' => $path,
            'filename' => $filename,
        ];
    }

    /**
     * Delete unused or old files.
     */
    public function cleanup(string $path, string $disk = 'public')
    {
        if (Storage::disk($disk)->exists($path)) {
            return Storage::disk($disk)->delete($path);
        }
        
        return false;
    }
}
