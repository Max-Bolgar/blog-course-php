@extends('layouts.default')
@section('content')
<h2>Заполните форму регистрации</h2>
{{--Ошибки--}}
@if (count($errors)>0)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="alert alert-danger" role="alert">
            <ul>                         
                @foreach($errors->all() as $error)                         
                <li> {{{ $error }}}</li>                         
                @endforeach    
            </ul>
        </div>
    </div>
</div>
@endif
<div class="register_form">
    <form role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
        <div class="form_item">
            <label>Ваше имя</label>
            <input type="text" class="form-control" id="name" placeholder="Имя" name='name' value="{{old('name')}}">
        </div>
        <div class="form_item">
            <label>Ваш логин</label>
            <input type="text" class="form-control" id="login" placeholder="Логин" name='login' value="{{old('login')}}">
        </div>
        <div class="form_item">
            <label>Ваш email</label>
            <input type="email" class="form-control" id="email" placeholder="Email" name='email' value="{{old('email')}}">
        </div>
        <div class="form_item">
            <label>Ваш пароль</label>
            <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
        </div>
        <div class="form_item">
            <label>Повторите пароль</label>
            <input type="password" class="form-control" id="confirm_password" placeholder="Повторите пароль" name="password_confirmation">
        </div>
        <div class="form_item">
            <button type="submit" class="btn" name="send_register">Зарегестрироваться</button>
        </div>
    </form>
</div>
@endsection