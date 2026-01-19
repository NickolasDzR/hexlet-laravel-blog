<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{

    // /**
    // * Страница выполненной работы
    // * @param CaseWork $caseWork
    // * @return View
    // */

    /**
     * Вывод списка стетей с учётом запрошенной (paginate($perPage). Стандартное 3 страницы) страницы. Ларавель автоматически определяет наличие параметра PAGE в запросе
     * И выполняет правильно смещение SQL
     */
    public function index(Request $request) {
        // получение значение из инпута с именем q
        $name = $request->input('q');

        // Создание построителя запросов (Query Builder) для модели Article. Запрос к БД еще не выполнен.
        $articles = Article::query();

        // Проверка, что поисковый запрос truthiness (не null, не пустая строка, не false)
        if ($name) {
            // Получаем все статьи, где (where) name (название статьи) содержит строку $name переданную из value инпута
            $articles->where('name', 'like', "%{$name}%");
        }

        // Выполняем запрос к БД с пагинацией (3 статьи на страницу)
        $articles = $articles->paginate(20);

        // Вызывается шаблон, в который передаётся коллекция статей. view($path, $params)
        // $params - ассоциативный массив, который затем попадает в шаблон
        // $params в данном случае, это все полученные статьи, в которых есть строка $name и сама строка $name
        return view('articles.index', compact('articles', 'name'));
    }

    /**
     * Параметр {$id} приходит в метод в виде аргумента
     * Имя может быть любым.
     * Важен порядок
     */
    public function show($id) {

        // find или findOrFail находит запись в бд по $id (или другому аргументу)
        // findOrFail поиск по $id выбрасывает ошибку 404 если запись не найдена
        // find просто поиск по $id или возвращает null, (!)что даёт возможность самому решить что делать, если запись не найдна.
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create() {
        $article = new Article();

        return view('articles.create', compact('article'));
    }

    public function store(Request $request) {

        Article::create(
            $request->validate([
                'name' => 'required|unique:articles',
                'body' => 'required|min:10',
            ])
        );

        return redirect()->route('articles.index');
    }

    /**
     * Параметр {$id} приходит в метод в виде аргумента
     * Для того, чтобы отобразить данные в форме
     */
    public function edit($id) {

        // Находим статью
        $article = Article::findOrFail($id);

        // Передаём её в шаблон edit
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article) {

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
}
