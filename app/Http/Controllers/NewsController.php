<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'resume' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        News::create([
            'title' => $request->title,
            'resume' => $request->resume,
            'author' => $request->author,
        ]);

        return redirect()->route('news.index')
                        ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.edit', compact('newsItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'resume' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $newsItem = News::findOrFail($id);

        // Especificar los campos para actualizar
        $newsItem->update($request->only(['title', 'resume', 'author']));

        return redirect()->route('news.index')
                        ->with('success', 'News updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('news.index')
                        ->with('success', 'News deleted successfully.');
    }
}
