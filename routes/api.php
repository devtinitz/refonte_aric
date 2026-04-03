<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('cms')->group(function() {
    Route::get('/history', [\App\Http\Controllers\Api\CmsController::class, 'history']);
    Route::post('/set-mode', [\App\Http\Controllers\Api\CmsController::class, 'setMode']);
    Route::post('/update-draft', [\App\Http\Controllers\Api\CmsController::class, 'updateDraft']);
    Route::post('/publish', [\App\Http\Controllers\Api\CmsController::class, 'publish']);
    Route::post('/rollback', [\App\Http\Controllers\Api\CmsController::class, 'rollback']);
    Route::post('/upload', [\App\Http\Controllers\Api\CmsUploadController::class, 'upload']);
    
    // Sections reordering
    Route::post('/sections/reorder', [\App\Http\Controllers\Api\CmsController::class, 'reorderSections']);
});
