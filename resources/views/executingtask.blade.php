@extends('layouts.app')

@section('content')

<div class="timer center">
    <h1>Start to work in "{{ $name }}"</h1>
    <h5 id="timer">00:00:00</h5>
    <button id="timer-button" class="btn btn-primary" onclick="onTimer()">Start</button>
    <form id="timer-form" action="" method="POST">
        @csrf
        <input type="hidden" id="timer-value" name="timervalue">
    </form>
</div>

<script>

var seconds = 1000;
var minutes = seconds * 60
var hours = minutes * 60;
play = false;
timer = document.getElementById('timer');
seconds = 0;
minutes = 0;
hours = 0;
time = '';

function onTimer(){
    if(play == false){
        play = true;
        document.getElementById('timer-button').textContent = 'Pause';
        if(typeof pauseButton === 'undefined'){
            pauseButton = document.createElement('input');
            pauseButton.value = 'Complete task';
            pauseButton.className = 'btn btn-success';
            pauseButton.setAttribute('onclick', "stop()");
            pauseButton.setAttribute('type', "submit");
            document.getElementById('timer-button').style.marginLeft = 'calc(50% - 120px)';
            document.getElementById('timer-form').appendChild(pauseButton);
        }

        Timer();
    }else{
        play = false;
        document.getElementById('timer-button').textContent = 'Play';
    }
    console.log(play);
}

function Timer(){
    if(play == true){
        if(seconds > 60){
            minutes++;
            seconds = 0;
        }
        if(minutes > 60){
            hours++;
            minutes = 0;
        }
        timer.innerHTML = String(hours).padStart(2, '0') + ":" + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0') ;
        //timer.innerHTML = seconds.toString();
        seconds++;
        setTimeout(Timer, 1000);
    }
}

function stop(){
    play = false;
    time = String(hours).padStart(2, '0') + ":" + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0') ;
    document.getElementById('timer-button').setAttribute('onclick', '');
    document.getElementById('timer-value').setAttribute('value', time);
}

</script>
@endsection