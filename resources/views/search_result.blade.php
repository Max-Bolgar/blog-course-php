@extends('layouts.default')
@section('content')
<h2>Результаты поиска</h2>
<div class="categories">
    <ul>
        @foreach($articles as $article)
        <li><a href="/post/{{$article->id}}">{{$article->name}}</a></li>
        @endforeach
    </ul>
</div>
@endsection
