@extends('layouts.app')
@section('content')
  <!-- Navigation -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Статьи</a>
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
  <header class="masthead" style="background-image: url('/blog/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Блог Инвольта</h1>
            <span class="subheading">Тестовый блог</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	@foreach($articles as $article)
        <div class="post-preview">
          <a href="{!! route('blog.show', [
          	'id' => $article->id,
          	'slug' => str_slug($article->title)
          ]) !!}">
            <h2 class="post-title">
              {!!$article->title!!}
            </h2>
            <h3 class="post-subtitle">
              {!!$article->short_text!!}
            </h3>
          </a>
          <p class="post-meta">Опубликовано
            <a href="#">{{$article->author}}</a>
            в {!!$article->updated_at->format('H:i d/m/Y')!!}</p>
        	</div>
       	@endforeach

        
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Еще статьи &rarr;</a>
        </div>
      </div>
    </div>
  </div>
@stop