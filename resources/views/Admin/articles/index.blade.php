@extends('layouts.admin')
@section('content')

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<br>
			<h1>Список статей</h1>
			<br>
			<a href="{!! route('articles.add') !!}" class="btn btn-info">Добавить статью</a>
			<br>
			<br>
			<table class="table">
				<tr>
					<th>#</th>
					<th>Наименование</th>
					<th>Автор</th>
					<th>Дата добавления</th>
					<th>Действия</th>
				</tr>

				@foreach($articles as $article)
				<tr>
					<td>{{$article->id}}</td>
					<td>{{$article->title}}</td>
					<td>{!!$article->author!!}</td>
					<td>{{$article->created_at->format('d-m-Y H:i')}}</td>
					<td><a href="{!! route('articles.edit', ['id' => $article->id]) !!}">Редактировать</a> || <a href="javascript:;" class="delete" rel="{{$article->id}}">Удалить</a></td>
				</tr>
				@endforeach
			</table>
      </main>
@stop
@section('js')
	<script>
		$(function(){
			$(".delete").on('click', function (){
				if(confirm("Вы действительно хотите удалить статью?")) {
					let id = $(this).attr("rel");
					$.ajax({
						type: "DELETE",
						url: "{!! route ('articles.delete')!!}",
						data: {_token: "{{csrf_token()}}", id:id},
						complete: function(){
							alert("Статья удалена");
							location.reload();
						}
					});
				}else{
					alert("Действие отменено пользователем");
					location.reload();
				}
			});
		});
	</script>
@stop