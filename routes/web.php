<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/', function () { 
    $sections = \App\Models\Section::where('page', 'welcome')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('welcome', compact('sections')); 
});
Route::get('/about', function () { 
    $sections = \App\Models\Section::where('page', 'about')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('about', compact('sections')); 
});
Route::get('/services', function () { 
    $sections = \App\Models\Section::where('page', 'services')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('services', compact('sections')); 
});
Route::get('/expertise', function () { 
    $sections = \App\Models\Section::where('page', 'expertise')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise', compact('sections')); 
});
Route::get('/expertise-industrie', function () { 
    $sections = \App\Models\Section::where('page', 'expertise-industrie')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise-industrie', compact('sections')); 
});
Route::get('/expertise-tertiaire', function () { 
    $sections = \App\Models\Section::where('page', 'expertise-tertiaire')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise-tertiaire', compact('sections')); 
});
Route::get('/expertise-efficacite', function () { 
    $sections = \App\Models\Section::where('page', 'expertise-efficacite')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise-efficacite', compact('sections')); 
});
Route::get('/expertise-sante', function () { 
    $sections = \App\Models\Section::where('page', 'expertise-sante')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise-sante', compact('sections')); 
});
Route::get('/expertise-solaire', function () { 
    $sections = \App\Models\Section::where('page', 'expertise-solaire')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise-solaire', compact('sections')); 
});
Route::get('/actualites', function () { 
    $sections = \App\Models\Section::where('page', 'actualites')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('actualites', compact('sections')); 
});
Route::get('/actualites/{id}', function ($id) { return view('detail', ['id' => $id]); });
Route::get('/recrutement', function () { 
    $sections = \App\Models\Section::where('page', 'recrutement')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('recrutement', compact('sections')); 
});
Route::get('/contact', function () { 
    $sections = \App\Models\Section::where('page', 'contact')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('contact', compact('sections')); 
});

// CMS Authentication Routes
Route::get('/login-cms', [App\Http\Controllers\CmsAuthController::class, 'showLogin'])->name('cms.login');
Route::post('/login-cms', [App\Http\Controllers\CmsAuthController::class, 'login'])->name('cms.login.submit');
Route::get('/logout', [App\Http\Controllers\CmsAuthController::class, 'logout'])->name('cms.logout');
