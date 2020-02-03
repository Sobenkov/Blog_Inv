@extends('layouts.admin')
@section('content')

		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
			<br>
			<h1>Список пользователей</h1>
			<br>
			<table class="table">
				<tr>
					<th>#</th>
					<th>E-mail</th>
					<th>Роль</th>
					<th>Дата регистрации</th>
				</tr>

				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->email}}</td>
					<td>@if($user->isAdmin) Администратор @else Пользователь @endif</td>
					<td>{{$user->created_at->format('d-m-Y H:i')}}</td>
				</tr>
				@endforeach
			</table>
      </main>
@stop
