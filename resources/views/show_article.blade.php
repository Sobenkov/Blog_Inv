@extends('layouts.app')
@section('content')
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link " href="#">Статьи</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Личный кабинет</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Регистрация</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
      </form>
    </div>
  </nav>

 <!-- Page Header -->
  <header class="masthead">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{!! $article->title !!}</h1>
            <h2 class="subheading">{!!$article->short_text!!}</h2>
            <span class="meta">Опубликовано
            <a href="#">{{$article->author}}</a>
            в {!!$article->updated_at->format('H:i d/m/Y')!!}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
				{!! $article->full_text !!}
        </div>
      </div>
      <br><br><br>
      <h3>Комментарии:</h3>
      @foreach($comments as $comment)
      <div class="comment" style="border: 1px solid #333;">
        <p><b>{{_user($comment->user_id)->email}}</b></p>
        <p>{{$comment->created_at->format('d-m-Y')}}</p>
        <p>{!! $comment->comment !!}</p>
      </div>
      <br>
      @endforeach
      @if(\Auth::check())
        <form action="{!! route('comments.add')!!}" method="post" accept-charset="utf-8">
          {!! csrf_field() !!}
          <input type="hidden" value="{{$article->id}}" name="article_id">
          <p>Оставить свой комментарий:<br>
            <textarea name="comment" class="form-control"></textarea>
          </p>
          <br>
          <button type="submit" class="btn btn-dark">Опубликовать</button>
        </form>
        @endif
    </div>
  </article>

@stop