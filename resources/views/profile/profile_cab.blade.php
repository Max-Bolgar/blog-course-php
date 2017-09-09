@extends('layouts.default')
@section('content')
<div class="profile_cab">
    <form method="POST" action="{{ route('profile_p') }}">
        {!! csrf_field() !!}
        <h2>Редактирование профиля</h2>
        <p>Зарегестрирован - {{$user->created_at}}</p>
        <p>На сайте уже {{$days}} дней(я)</p>
        <input type="hidden" name="id" value="{{ $user->id }}">
        <label>Логин</label>
        <input type="text" name="login" value="{{ $user->login }}" placeholder="Логин">
        <label>Имя</label>
        <input type="text" name="name" value="{{ $user->name }}" placeholder="Имя">
        <label>E-mail</label>
        <input type="text" name="email" value="{{ $user->email }}" placeholder="E-mail">
        <label>Пароль</label>
        <input type="password" name="password" value="" placeholder="Пароль">
    <button type="submit" class="btn btn-primary">Обновить информацию</button>
</form>
</div>
@endsection