@extends('layouts.app')

@section('content')
<div class="wrap-content">
    <h2 class="title">Today's task</h2>
    <div class="menu-select">
        <a href="/listall" class="btn btn-primary">List all tasks</a>
        <a href="/checked" class="btn btn-success">Checked task</a>
        <a href="/unchecked" class="btn btn-secondary">Unchecked task</a>
        <a href="/notes" class="btn btn-warning">Notes</a>
        <a href="/rewards" type="button" class="btn btn-light">
            Rewards @isset($rewards) @if(count($rewards) != 0)<span class="badge badge-danger">{{ count($rewards) }}</span> @endif @endisset
        </a>
    </div>
    <div class="clear"></div>

<div class="notes">
    @foreach($notes as $n)
    <div class="card text-center">
    <div class="card-body" style="background: {{ $n->background_color }}; color: {{ $n->font_color }};">
            <p class="card-text">{{ $n->content }}</p>
        </div>
        <div class="card-footer text-muted">
            <a href="/edit/note/{{ $n->id }}">Edit</a>
            <a href="/delete/note/{{ $n->id }}">Delete</a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection