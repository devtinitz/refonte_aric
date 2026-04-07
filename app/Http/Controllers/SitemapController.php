<?php
/*
 * Antigravity Perfection Phase 1
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expertise;
use App\Models\Article;
use App\Models\JobOffer;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            ['url' => route('home'), 'lastmod' => Carbon::now()->toAtomString(), 'priority' => '1.0'],
            ['url' => url('/about'), 'lastmod' => Carbon::now()->subDays(1)->toAtomString(), 'priority' => '0.8'],
            ['url' => url('/services'), 'lastmod' => Carbon::now()->subDays(1)->toAtomString(), 'priority' => '0.8'],
            ['url' => url('/expertise'), 'lastmod' => Carbon::now()->subDays(1)->toAtomString(), 'priority' => '0.9'],
            ['url' => url('/actualites'), 'lastmod' => Carbon::now()->toAtomString(), 'priority' => '0.9'],
            ['url' => url('/recrutement'), 'lastmod' => Carbon::now()->toAtomString(), 'priority' => '0.8'],
            ['url' => url('/contact'), 'lastmod' => Carbon::now()->subMonths(1)->toAtomString(), 'priority' => '0.7'],
        ];

        // Dynamic expertises
        $expertises = Expertise::where('is_active', true)->get();
        foreach ($expertises as $expertise) {
            $urls[] = [
                'url' => url('/expertise-' . $expertise->slug), 
                'lastmod' => $expertise->updated_at->toAtomString(),
                'priority' => '0.8'
            ];
        }

        // Dynamic News
        $articles = Article::where('is_published', true)->get();
        foreach ($articles as $article) {
            $urls[] = [
                'url' => route('news.detail', $article->slug),
                'lastmod' => $article->updated_at->toAtomString(),
                'priority' => '0.7'
            ];
        }

        return response()->view('cms.sitemap', compact('urls'))->header('Content-Type', 'text/xml');
    }
}
