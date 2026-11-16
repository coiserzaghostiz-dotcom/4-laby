<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Text;

class NewsController extends Controller
{
    public function index()
    {
        $news = Text::with(['category', 'author'])
            ->where('blocked', false)
            ->latest()->orderByDesc('id')->paginate(5);

        return view('feed', ['title' => 'Все новости', 'news' => $news]);
    }

    public function category(?Category $category = null)
    {
        $categories = Category::orderBy('id')->get();
        $category ??= $categories->first();

        abort_if($category === null, 404);

        $news = $category->texts()->with(['category', 'author'])
            ->where('blocked', false)
            ->latest()->orderByDesc('id')->paginate(5);

        return view('feed', [
            'title' => $category->name,
            'news' => $news,
            'categories' => $categories,
            'selectedCategory' => $category,
        ]);
    }

    public function show(Text $article)
    {
        abort_if($article->blocked, 404);

        return view('article', ['article' => $article]);
    }
}
