@extends('layouts.app')

@section('content')
<a href="/" class="back-button btn btn-primary">Back</a>
<div class="content w-50 center">
<form action="/new/note" method="POST">
    @csrf
    <h2 class="title">Add new note</h2>
    <div class="form-group">
        <label>Content</label>
        <textarea cols="5" class="form-control" name="content" placeholder="Content of this note" required></textarea>
    </div>
    <div class="form-group">
        <label>Background color</label>
        <select name="background_color" class="form-control">
            <option value="#eca1a6" >Red</option>
            <option value="#86af49" >Green</option>
            <option value="#ffef96" >Yellow</option>
            <option value="white" >White</option>
            <option value="#80ced6" >Blue</option>
        </select>
    </div>
    <div class="form-group">
        <label>Font color</label>
        <select name="font_color" class="form-control">
            <option value="black" >Black</option>
            <option value="red" >Red</option>
            <option value="green" >Green</option>
            <option value="yellow" >Yellow</option>
            <option value="white" >White</option>
            <option value="blue" >Blue</option>
        </select>
    </div>
    <div class="form-group">
        <label>Date of note</label>
        <input type="date" class="form-control" name="date" value="{{ $today }}" required>
    </div>
    <input type="submit" class="btn btn-primary" name="action" value="Register!">
</form>
</div>
@endsection