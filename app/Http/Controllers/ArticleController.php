<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $articles = ArticleModel::get_all();

        return view('articles.index', compact('articles'));
    }

    public function show($id) {
        $article = ArticleModel::find_id($id);
        $tags = explode(',', $article->tags);

        return view('articles.show', compact('article', 'tags'));
    }

    public function create() {
        return view('articles.create');
    }

    public function store(Request $request) {
        $new_article = ArticleModel::save($request->all());

        return redirect('/articles');
    }

    public function edit($id) {
        $article = ArticleModel::find_id($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, Request $request) {
        $article = ArticleModel::update($id, $request->all());

        return redirect('/articles');
    }

    public function destroy($id) {
        $article = ArticleModel::destroy($id);

        return redirect('/articles');
    }
}
