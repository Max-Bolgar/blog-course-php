@extends('adminPanel.main')
@section('content')
<h2>Новая статья</h2>
<div class="col-md-9">
    <div class="add_post">
        <form action="{{ route('admin_add_post_p') }}" method="POST">
            {!! csrf_field() !!}
            <label>Заголовок</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Заголовок">
            <label>Категория</label>
            <select name="category">
                @foreach($categories as $category => $key)
                <option><span>{{$category}}. </span>{{$key}}</option>
                @endforeach
            </select>
            <label>Описание</label>
            <input type="text" name="description" value="{{ old('description') }}" placeholder="Описание">
            <label>Текст</label>
            <textarea name="text" rows="10" cols="60">{{ old('text') }}</textarea>
            <label>Изображение</label>
            <input type="text" value="{{ old('img') }}" name="img" placeholder="Ссылка на изображение">
            <label>Теги</label>
            <select name="tags[]" multiple>
                @foreach($tags as $tag => $key)
                <option><span>{{$tag}}. </span>{{$key}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn">Отправить</button>
        </form>
    </div>
</div>
<div class="col-md-3">
    <div class="add_Tag">
        <h3>Создать категорию</h3>
        <form action="{{ route('admin_add_category_p') }}" method="POST">
            {!! csrf_field() !!}
            <label>Название категории</label>
             <input type="text" name="cat" value="{{ old('cat') }}" placeholder="Категория">
             <button type="submit" class="btn">Создать</button>
        </form>
        <h3>Создать новый тег</h3>
        <form action="{{ route('admin_add_tag_p') }}" method="POST">
            {!! csrf_field() !!}
            <label>Название тега</label>
             <input type="text" name="tag" value="{{ old('tag') }}" placeholder="Тег">
             <button type="submit" class="btn">Создать</button>
        </form>
    </div>
</div>
@endsection