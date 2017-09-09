@extends('adminPanel.main')
@section('content')

<form method="POST" action="{{ route('admin_update_post_p') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{ $article->id }}">
    <label for="name">Заголовок</label>
    <input type="text" name="name" value="{{ $article->name }}" placeholder="Заголовок">
    <label for="name">Описание</label>
    <input type="text" name="description" value="{{ $article->description }}" placeholder="Описание">
    <label for="text">Текст</label>
    <textarea name="text" rows="10" cols="60">{{ $article->text }}</textarea>
    <label for="img">Изображение</label>
    <input type="text" value="{{ $article->img }}" name="img" placeholder="img">
    <button type="submit" class="btn btn-primary">Обновить</button>
    <button type="submit" class="btn" name="delete">Удалить пост</button>
</form>

@endsection