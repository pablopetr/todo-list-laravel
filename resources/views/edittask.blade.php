@extends('layouts.app')

@section('content')
<a href="/" class="back-button btn btn-primary">Back</a>
<div class="content w-50 center">
<form action="/update/{{ $task->id }}" method="POST">
    @csrf
    <h2 class="title">Add new task</h2>
        <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" placeholder="Title of the task" name="title" value="{{ $task->title }}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea cols="5" class="form-control" name="description" placeholder="Description of task">{{ $task->description }}</textarea>
    </div>
    <div class="form-group">
        <label>Reward</label>
        <input type="text" class="form-control" name="reward" placeholder="Reward for completing your task" value="{{ $task->reward }}">
    </div>
    <div class="form-group">
        <label>Data to do the task</label>
        <input type="date" class="form-control" name="date" value="{{ $task->date }}">
    </div>
    <input type="submit" class="btn btn-primary" name="action" value="Register!">
</form>
</div>
@endsection