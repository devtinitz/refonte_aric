<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

Route::get('/', function () { 
    $sections = \App\Models\Section::where('page', 'welcome')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    $expertises = \App\Models\Expertise::where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('welcome', compact('sections', 'expertises')); 
})->name('home');

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
    $expertises = \App\Models\Expertise::where('is_active', true)
        ->orderBy('order')
        ->get();
    return view('expertise', compact('sections', 'expertises')); 
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
    $articles = \App\Models\Article::where('is_published', true)
        ->orderBy('published_at', 'desc')
        ->orderBy('order')
        ->get();
    return view('actualites', compact('sections', 'articles')); 
});

Route::get('/actualites/{slug}', function ($slug) { 
    $article = \App\Models\Article::where('slug', $slug)->firstOrFail();
    return view('article-detail', compact('article')); 
})->name('news.detail');
Route::get('/recrutement', function () { 
    $sections = \App\Models\Section::where('page', 'recrutement')
        ->where('is_active', true)
        ->orderBy('order')
        ->get();
    $jobs = \App\Models\JobOffer::where('is_active', true)
        ->orderBy('order')
        ->orderBy('created_at', 'desc')
        ->get();
    return view('recrutement', compact('sections', 'jobs')); 
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

// CMS Protected Routes
Route::middleware(['auth'])->prefix('cms')->group(function () {
    // User Management (Super Admin Only)
    Route::group(['middleware' => function ($request, $next) {
        if (!auth()->user()->is_super_admin) {
            return redirect('/')->with('error', "Accès refusé. Seul le Super Administrateur peut gérer les comptes.");
        }
        return $next($request);
    }], function () {
        Route::get('/users', [App\Http\Controllers\CmsUserController::class, 'index'])->name('cms.users.index');
        Route::post('/users', [App\Http\Controllers\CmsUserController::class, 'store'])->name('cms.users.store');
        Route::delete('/users/{id}', [App\Http\Controllers\CmsUserController::class, 'destroy'])->name('cms.users.destroy');
    });

    // Profile
    Route::post('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('cms.profile.password.update');

    // History (Full Page)
    Route::get('/history', [App\Http\Controllers\CmsHistoryController::class, 'index'])->name('cms.history.index');
    Route::post('/history/rollback', [App\Http\Controllers\CmsHistoryController::class, 'rollback'])->name('cms.history.rollback');

    // Settings
    Route::get('/settings', [App\Http\Controllers\CmsSettingsController::class, 'index'])->name('cms.settings.index');
    Route::post('/settings/update', [App\Http\Controllers\CmsSettingsController::class, 'update'])->name('cms.settings.update');

    // Job Offers CRUD
    Route::resource('jobs', App\Http\Controllers\CmsJobController::class, [
        'as' => 'cms'
    ]);
    Route::post('/jobs/reorder', [App\Http\Controllers\CmsJobController::class, 'reorder'])->name('cms.jobs.reorder');

    // News CRUD
    Route::resource('news', App\Http\Controllers\CmsArticleController::class, [
        'as' => 'cms',
    ]);

    // Expertise CRUD
    Route::resource('expertises', App\Http\Controllers\CmsExpertiseController::class, [
        'as' => 'cms',
    ]);
    Route::post('/expertises/reorder', [App\Http\Controllers\CmsExpertiseController::class, 'reorder'])->name('cms.expertises.reorder');
});
