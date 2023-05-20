<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::all();

        // dd($articles);

        return view('article.index', ['articles' => $articles]);
    }

    public function show(String $articleId): View
    {
        $article = Article::findOrFail($articleId);

        return view('article.show', ['article' => $article]);
    }

    public function store(StoreArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->validated('title');
        $article->body = $request->validated('body');
        $article->save();

        return redirect()->route('home');
    }

    public function destroy(String $articleId)
    {
        Article::find($articleId)->delete();

        return redirect()->route('home');
    }

    public function edit(String $articleId): View {
        $article = Article::find($articleId);

        return view('article.edit', compact('article'));
    }

    public function update(String $articleId, UpdateArticleRequest $request)
    {
        $article = Article::find($articleId);
        $article->title = $request->validated()['title'];
        $article->body = $request->validated()['body'];
        $article->save();

        return redirect()->route('home');
    }
}
