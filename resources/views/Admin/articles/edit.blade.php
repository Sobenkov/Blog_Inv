@extends('layouts.admin')
@section('content')

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<h1>Редактировать статью</h1>
			<form method="post">
				{!! csrf_field() !!}
				<p>Выбор категории (ий):<br><select name="categories[]" class="form-control" multiple>
					@foreach($categories as $category)
						<option value="{{$category->id}}"
							@if(in_array($category->id, $arrCategories)) selected @endif> 
							{{$category->title}}
						</option>
					@endforeach
				</select></p>
				<p>Название статьи:<br><input type="text" name="title" value="{{$article->title}}" class="form-control"></p>
				<p>Автор:<br><input type="text"name="author" value="{{$article->author}}" class="form-control"></p>
				<p>Короткий текст:<br><textarea name="short_text" class="form-control">{!! $article->short_text !!}</textarea></p>
				<p>Полный текст:<br><textarea name="full_text" class="form-control">{!! $article->full_text !!}</textarea></p>
				<button type="submit" class="btn btn-success">Редактировать</button>
			</form>
      </main>
@stop