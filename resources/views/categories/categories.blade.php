@extends('layouts.default')
@section('content')
<h2>Список категорий</h2>
<div class="categories">
    <ul>
        @foreach($categories as $category)
        <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>
@endsection