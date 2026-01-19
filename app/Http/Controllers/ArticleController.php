<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

// TODO - Сделать комментарии к каждой строке, объясняющие суть работы методов.

class ArticleController extends Controller
{
    /**
     * Возвращаем в шаблон всё статьи с пагинацией (100 статьи на страницу)
     * Либо через поиск
     */
    public function index(Request $request)
    {
        //
        $name = $request->input('name');

        $articles = Article::query();

        if ($name) {
            $articles = $articles->where('name', 'like', "%{$name}%");
        }

        $articles = $articles->paginate(100);

        return view('articles.index', compact('articles', 'name'));
    }

    /**
     * Создаём объект для вывода формы
     */
    public function create()
    {
        $article = new Article();
        return vieW('articles.create', compact('article'));
    }

    /**
     * Сохраняем новосозданную статью
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:articles|max:100',
            'body' => 'required|min:10',
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()->route('articles.index');
    }

    /**
     * Передаём нужную статью в шаблон и показываем её
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article = Article::findOrFail($article->id);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'name' => [
                'required',
                Rule::unique('articles')->ignore($article->id),
            ],
             'body' => 'required|min:10',
        ]);

        $article->update($data);

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article = Article::find($article->id);

        if ($article) {
            $article->delete();
        }

        return redirect()->route('articles.index');
    }
}
