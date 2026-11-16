<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Text;
use Illuminate\Http\Request;

class JournalistController extends Controller
{
    public function index(Request $request)
    {
        $news = $request->user()->texts()->latest()->orderByDesc('id')->get();

        return view('journalist', [
            'categories' => Category::orderBy('name')->get(),
            'news' => $news,
        ]);
    }

    public function store(Request $request)
    {
        $request->user()->texts()->create($this->articleData($request));

        return redirect()->route('journalist')->with('message', 'Статья опубликована.');
    }

    public function edit(Request $request, Text $article)
    {
        abort_unless($article->user_id === $request->user()->id, 403);

        return view('edit', [
            'article' => $article,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Text $article)
    {
        abort_unless($article->user_id === $request->user()->id, 403);

        $article->update($this->articleData($request));

        return redirect()->route('journalist')->with('message', 'Статья сохранена.');
    }

    private function articleData(Request $request): array
    {
        return $request->validate([
            'heading' => ['required', 'string', 'max:150'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'text' => ['required', 'string', 'max:15000'],
        ]);
    }
}
