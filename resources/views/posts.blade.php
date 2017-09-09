@extends('layouts.default')
@section('content')
<div class="main_content">
    <div class="title">{{$article->name}}</div>
    <p class="date">Время публикации: <span>{{$article->created_at}}</span></p>
    <img src="{{$article->img}}">
    <p>{{$article->text}}</p>
    <div class="tags">
        <p>Теги:</p>
        @foreach($tags as $tag)
        <a href="/posts/tag/{{$tag->id}}">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
<div class="comments">
    <div class="title">Комментарии</div>
    @foreach($comments as $comment)
    <div class="comment">
        <p class="comment_title">Пользователь: <span>{{$comment->user->name}}</span> в <span>{{$comment->created_at}}</span> добавил комментарий:</p>
        <p>{{$comment->comment}}</p>
    </div>
    @endforeach
    @if (Auth::guest())
    <p>Для добавления комментария, пожалуйста, авторизируйтесь</p>
    @else
    <p>Ваш комментарий:</p>
    <form action="{{route('comment_p')}}" method="POST">
        {!! csrf_field() !!}
        <input name="article_id" type="hidden" value="{{$article->id}}">
        <textarea name="comment" rows="10" cols="60">{{ old('comment') }}</textarea><br>
        <button type="submit" class="btn">Отправить</button>
    </form>
    @endif
</div>
@endsection