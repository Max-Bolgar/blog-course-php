@extends('adminPanel.main')
@section('content')
<h2>Редактирование комментария</h2>
<form method="POST" action="{{ route('admin_edit_comment_p') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{ $comment->id }}">
    <label>Текст комментария:</label>
    <input type="text" name="comment" value="{{ $comment->comment }}" placeholder="Комментарий">
    <button type="submit" class="btn btn-primary">Обновить</button>
    <button type="submit" class="btn" name="delete">Удалить комментарий</button>
</form>

@endsection