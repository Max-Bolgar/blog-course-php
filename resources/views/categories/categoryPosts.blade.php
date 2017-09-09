@extends('layouts.default')
@section('content')
<h2>Статьи категории "{{$category->name}}"</h2>
        <div class="main_content">
            @foreach($catArticles as $catArticle)
            <div class="title">{{$catArticle->name}}</div>
            <p class="date">Время публикации: <span>{{$catArticle->created_at}}</span></p>
            <img src="{{$catArticle->img}}">
            <p>{{$catArticle->description}}</p>
            <div class="btn"><a href="/post/{{$catArticle->id}}">Читать далее...</a></div>
            @endforeach
        </div>
@endsection