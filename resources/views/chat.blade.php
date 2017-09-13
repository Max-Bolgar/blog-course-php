@extends('layouts.default')
@section('content')
<div class="chat">
    <div class="messages">
        <h2>Очень простой чат</h2>
        <hr>
        <ul>
            @foreach($messages as $message)
            <div class="title">{{$message->created_at}} | {{$message->user->name}},  написал:</div>
            <li><?php $formatMsg = nl2br($message->message); 
            echo $formatMsg;?></li>
              <?php echo '<input type = "submit" onclick="document.getElementById(\'text_msg\').value=\''. $message->user->name .', \'" value = "Ответить" />';?>
            @endforeach
        </ul>
    </div>
    <div class="chatForm">
        @if (Auth::guest())
        <p>Для добавления сообщений авторизируйтесь</p>
        @else
        <form action="{{route('chat_p')}}" method="POST">
            {!! csrf_field() !!}  
            <textarea id="text_msg" name="message" rows="10" cols="60">{{ old('message') }}</textarea><br>
            <button type="submit" class="btn">Отправить</button>
        </form>
        @endif
    </div>
</div>
{{ $pagination }}
@endsection