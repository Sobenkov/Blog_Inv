<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entities\Category;

class CategoriesController extends Controller
{
   public function index()
    {
    	$objCategory = new Category();
    	$categories = $objCategory->get();
    	return view('admin.categories.index', ['categories' => $categories]);
    }

   public function addCategory()
    {
    	return view('admin.categories.add');
    }
   public function addRequestCategory(Request $request)
   {
   	try{
   		$this->validate($request, [
   			'title' => 'required|string|min:4',
   			'description' => 'required'
   		]);
	   	$objCategory = new Category();
	   	$objCategory = $objCategory->create([
	   		'title' => $request->input('title'),
	   		'description' => $request->input('description')
	   	]);
	   	if($objCategory){
	   		return redirect()->route('categories')->with('success', 'Категория успешно добавлена');
	   	}
	   	return back()->with('error', 'Не удалось добавить категорию');

	   }catch(ValidationException $e) {
	   	\Log::error($e->getMessage());
	   	return back()->with('error', $e->getMessage());
	   }
   }

   public function editCategory(int $id)
    {
    	$category = Category::find($id);
    	return view('admin.categories.edit', ['category' => $category]);
    }
   public function editRequestCategory(Request $request, int $id)
   {
   	try{
   		$this->validate($request, [
   			'title' => 'required|string|min:4',
   			'description' => 'required'
   		]);
	   	$objCategory = Category::find($id);

	   	$objCategory->title = $request->input('title');
	   	$objCategory->description = $request->input('description');

	   	if($objCategory->save ()){
	   		return back()->with('success', 'Категория успешно изменена');
	   	}
	   	return back()->with('error', 'Не удалось изменить категорию');

	   }catch(ValidationException $e) {
	   	\Log::error($e->getMessage());
	   	return back()->with('error', $e->getMessage());
	   }
   }

   public function deleteCategory(Request $request)
    {
    	if($request->ajax()){
    		$id = (int) $request-> input ('id');
    		$objCategory = new Category();

    		$objCategory->where('id, $id')->delete();

    		echo "success";
    	}
    }
}
