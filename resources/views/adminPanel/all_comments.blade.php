@extends('adminPanel.main')
@section('content')

<h2>Список всех комментариев</h2>
<p>(выберите комментарий который Вы хотите редактировать)</p>
<ul>
    @foreach($comments as $comment) 
    <li>
        <a href="comment/{{$comment->id}}">{{$comment->comment}}</a>
    </li>
    @endforeach
</ul>
@endsection