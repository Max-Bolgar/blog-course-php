@extends('layouts.default')
@section('content')
<div class="main_content">
    @foreach($articles as $article)
    <div class="title">{{$article->name}}</div>
    <p class="date">Время публикации: <span>{{$article->created_at}}</span></p>
    <img src="{{$article->img}}">
    <p>{{$article->description}}</p>
    <div class="btn"><a href="/post/{{$article->id}}">Читать далее...</a></div>

    @endforeach
</div>
{{ $pagination }} 
@endsection

