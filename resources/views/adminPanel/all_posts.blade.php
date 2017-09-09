@extends('adminPanel.main')
@section('content')

<h2>Список всех постов</h2>
<p>(выберите статью которую Вы хотите редактировать)</p>
<ul>
    @foreach($articles as $article) 
    <li>
        <a href="/admin/update/post/{{$article->id}}">{{$article->name}}</a>
    </li>
    @endforeach
</ul>
@endsection