@extends('layouts.default')
@section('content')
<h2>Все статьи тега "{{$tag->name}}"</h2>
<div class="tagPosts">
    <ul>
        @foreach($posts as $post)
        <li><a href="/post/{{$post->id}}">{{$post->name}}</a></li>
        @endforeach
    </ul>
</div>
@endsection

