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
        <li class="nav-item">
          <a class="nav-link" href="#">Статьи</a>
        </li>
        <li class="nav-item active">
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
  <header class="masthead" style="background-image: url('/blog/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
          	@if(\Auth::user()->isAdmin == 1)
            <h3><a href="{{route('admin')}}">В админку</a><br></h3>
            @endif
            <span class="subheading"><a href="{{ route('logout') }}">Выйти</a></span>
          </div>
        </div>
      </div>
    </div>
  </header>

@stop
