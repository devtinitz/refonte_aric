<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CmsArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderBy('order')->orderBy('created_at', 'desc')->get();
        return view('cms.news.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.news.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($request->title);
        
        // Ensure slug is unique
        $count = Article::where('slug', 'like', $data['slug'] . '%')->count();
        if ($count > 0) {
            $data['slug'] = $data['slug'] . '-' . ($count + 1);
        }

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('news', 'public');
            $data['image'] = '/storage/' . $path;
        }

        Article::create($data);

        return redirect()->route('cms.news.index')->with('success', 'Actualité publiée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $news)
    {
        return view('cms.news.form', ['article' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        $data = $validated;
        
        // Update slug if title changed
        if ($request->title !== $news->title) {
            $data['slug'] = Str::slug($request->title);
            $count = Article::where('slug', 'like', $data['slug'] . '%')->where('id', '!=', $news->id)->count();
            if ($count > 0) {
                $data['slug'] = $data['slug'] . '-' . ($count + 1);
            }
        }

        if ($request->hasFile('image_file')) {
            // Delete old image if exists
            if ($news->image && str_contains($news->image, '/storage/news/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $news->image));
            }
            $path = $request->file('image_file')->store('news', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $news->update($data);

        return redirect()->route('cms.news.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $news)
    {
        if ($news->image && str_contains($news->image, '/storage/news/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $news->image));
        }
        $news->delete();
        return redirect()->route('cms.news.index')->with('success', 'Actualité supprimée.');
    }
}
