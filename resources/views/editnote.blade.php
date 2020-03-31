@extends('layouts.app')

@section('content')
<a href="/notes" class="back-button btn btn-primary">Back</a>
<div class="content w-50 center">
<form action="/update/note/{{ $note->id }}" method="POST">
    @csrf
    <h2 class="title">Add new note</h2>
    <div class="form-group">
        <label>Description</label>
        <textarea cols="5" class="form-control" name="content" placeholder="Content of note">{{ $note->content }}</textarea>
    </div>
    <div class="form-group">
        <label>Background color</label>
        <select name="background_color" class="form-control">
            <option value="#eca1a6" @if($note->background_color == 'red') selected @endif >Red</option>
            <option value="#86af49" @if($note->background_color == 'green') selected @endif >Green</option>
            <option value="#ffef96" @if($note->background_color == 'yellow') selected @endif>Yellow</option>
            <option value="white" @if($note->background_color == 'white') selected @endif >White</option>
            <option value="#80ced6" @if($note->background_color == 'blue') selected @endif >Blue</option>
        </select>
    </div>
    <div class="form-group">
        <label>Font color</label>
        <select name="font_color" class="form-control">
            <option value="black" @if($note->font_color == 'black') selected @endif >Black</option>
            <option value="red" @if($note->font_color == 'red') selected @endif >Red</option>
            <option value="green" @if($note->font_color == 'green') selected @endif >Green</option>
            <option value="yellow" @if($note->font_color == 'yellow') selected @endif>Yellow</option>
            <option value="white" @if($note->font_color == 'white') selected @endif >White</option>
            <option value="blue" @if($note->font_color == 'blue') selected @endif >Blue</option>
        </select>
    </div>  
    <div class="form-group">
        <label>Note date</label>
        <input type="date" class="form-control" name="date" value="{{ $note->date }}">
    </div>
    <input type="submit" class="btn btn-primary" name="action" value="Register!">
</form>
</div>
@endsection