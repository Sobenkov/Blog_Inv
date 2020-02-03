@extends('layouts.app')
@section('content')
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
      @if(\Auth::check())
        <form action="{!! route('comments.add')!!}" method="post" accept-charset="utf-8">
          {!! csrf_field() !!}
          <p>Комментарий:<br>
            <textarea name="comment" class="form-control"></textarea>
          </p>
          <br>
          <button type="submit" class="btn btn-success">Добавить комментарий</button>
        </form>
        @endif
    </div>
  </article>

@stop