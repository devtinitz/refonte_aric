<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CmsUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp,mp4,mov,avi,wmv,webm,ogg,mkv|max:102400', // max 100MB
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $extension;
            
            // Store on public disk
            $path = $file->storeAs('cms', $filename, 'public');
            
            return response()->json([
                'success' => true,
                'url' => Storage::disk('public')->url($path),
                'filename' => $filename,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Aucun fichier reçu',
        ], 400);
    }
}
