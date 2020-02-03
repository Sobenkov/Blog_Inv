<?php

namespace App\Http\Controllers;

use App\Entities\Article;

Class ArticlesController extends Controller
{
	public function index()
	{
		$objArticle = new Article();
		$articles = $objArticle->orderBy('id', 'desc')->paginate(5);

		return view('index', ['articles' => $articles]);
	}
	public function showArticle(int $id, $slug)
	{
		$objArticle= Article::find($id);
		$comments = $objArticle->comments()->paginate(5);
		return view('show_article', ['article' => $objArticle, 'comments' => $comments]);
	}
}