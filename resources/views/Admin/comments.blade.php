@extends('layouts.admin')
@section('content')

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<br>
			<h1>Список комментариев</h1>
			<br>
			<table class="table">
				<tr>
					<th>#</th>
					<th>Статья</th>
					<th>Пользователь</th>
					<th>Комментарий</th>
					<th>Статус</th>
					<th>Дата</th>
				</tr>

				@foreach($comments as $comment)
				<tr>
					<td>{{$comment->id}}</td>
					<td>{{_article($comment->article_id)->title}}</td>
					<td>{{_user($comment->user_id)->email}}</td>
					<td>{{$comment->comment}}</td>
					<td>@if($comment->status) Активен @else На модерации<br><a href="{!! route('comment.accepted', ['id' =>$comment->id])!!}">Одобрить</a> @endif</td>
					<td>{!! $comment->created_at->format('d-m-Y H:i') !!}</td>
				</tr>
				@endforeach
			</table>
      </main>
@stop