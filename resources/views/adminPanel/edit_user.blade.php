@extends('adminPanel.main')
@section('content')

<form method="POST" action="{{ route('admin_edit_user') }}">
    {!! csrf_field() !!}
    <h2>Редактирование пользователя</h2>
     <p>Зарегестрирован - {{$userInfo->created_at}}</p>
    <input type="hidden" name="id" value="{{ $userInfo->id }}">
    <label>Логин</label>
    <input type="text" name="login" value="{{ $userInfo->login }}" placeholder="Логин">
    <label>Имя</label>
    <input type="text" name="name" value="{{ $userInfo->name }}" placeholder="Имя">
    <label>E-mail</label>
    <input type="text" name="email" value="{{ $userInfo->email }}" placeholder="E-mail">
    <label>Пароль</label>
    <input type="password" name="password" value="{{ $userInfo->password }" placeholder="Пароль">
    <button type="submit" class="btn btn-primary">Обновить информацию</button>
</form>

@endsection