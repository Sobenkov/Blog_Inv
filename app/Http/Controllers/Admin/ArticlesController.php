<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Category;
use App\Entities\Article;
use App\Entities\CategoryArticle;
use App\Http\Requests\ArticleRequest;


class ArticlesController extends Controller
{
	public function index()
	{
		$objArticle = new Article();
		$articles = $objArticle->get();
		return view('admin.articles.index', ['articles' => $articles]);
	}

	public function addArticle()
	{
		$objCategory = new Category();
		$categories =$objCategory->get();

		return view('admin.articles.add', ['categories' => $categories]);
	}

	public function addRequestArticle(ArticleRequest $request)
	{
		$objArticle = new Article();
		$objCategoryArticle = new CategoryArticle();

		$fullText= $request->input('full_text') ?? null;
		$objArticle=$objArticle->create([
			'title' => $request->input('title'),
			'short_text' => $request->input('short_text'),
			'full_text' => $fullText,
			'author' => $request->input('author')

		]);

		if($objArticle) {
			foreach ($request->input('categories') as $category_id) {
				$category_id = (int)$category_id;
				$objCategoryArticle = $objCategoryArticle->create([
					'category_id' => $category_id,
					'article_id' => $objArticle->id
				]);
			}

			return redirect()->route('articles')->with('success', 'Статья успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить статью');

		
	}

	public function editArticle(int $id)
	{
		$objCategory = new Category();
		$categories =$objCategory->get();
		$objArticle = Article::find($id);

		return view('admin.articles.edit', [
			'categories' => $categories,
			'article' => $objArticle
		]);
	}
	public function editRequestArticle(int $id, ArticleRequest $request)
	{
		$objArticle = Article::find($id);
		$objArticle->title = $request->input('title');
		$objArticle->short_text = $request->input('short_text');
		$objArticle->full_text = $request->input('full_text');
		$objArticle->author = $request->input('author');

		if($objArticle->save ()){
	   		return redirect()->route('articles')->with('success', 'Статья успешно изменена');
	   	}
	   	return redirect()->route('articles')->with('error', 'Не удалось изменить статью');

	}
	public function deleteArticle(Request $request)
	{
		if($request->ajax()) {
    		$id = (int)$request-> input ('id');
    		$objArticle = new Article();

    		$objArticle->where('id', $id)->delete();

    		echo "success";
    	}
	}
}
