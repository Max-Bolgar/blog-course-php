@extends('layouts.default')
    @section('content')
    <div class="contacts">

        <h2>Оставьте свое сообщение</h2>

        @if(count($errors) > 0 )

        <div class="alert alert-danger">
            <h2>Ошибка валидации:</h2>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('contacts')}}" method="POST">
            {{ csrf_field() }}
            <label>Ваше имя</label>
            <input type="text" name="name"  placeholder="Ваше имя"> <br>
             <label>Ваш e-mail</label>
            <input type="text" name="email"  placeholder="Ваш email">
             <label>Ваше сообщение</label>
            <textarea rows="10" cols="45" name="msg"></textarea><br>
            <input class="btn" type="submit" name="send" value="Отправить">
        </form>
    </div>
    @endsection
