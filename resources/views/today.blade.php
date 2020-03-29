@extends('layouts.app')

@section('content')

<div class="wrap-content">
    <h2 class="title">Today's task</h2>
    <div class="menu-select">
        <a href="/listall" class="btn btn-primary">List all tasks</a>
        <a href="/checked" class="btn btn-success">Checked task</a>
        <a href="/unchecked" class="btn btn-warning">Unchecked task</a>
        <a href="/rewards" type="button" class="btn btn-light">
            Rewards @isset($rewards) @if(count($rewards) != 0)<span class="badge badge-danger">{{ count($rewards) }}</span> @endif @endisset
        </a>
    </div>
    <div class="date-select">
        <form class="search-form" action="/search" method="POST">
            @csrf
            <input type="date" class="date-select" name="date" value="<?php echo date('Y-m-d'); ?>">
            <input type="submit" class="btn btn-primary" value="search" >
        </form>
    </div>
<div class="clear"></div>
@isset($taskList)

<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Date</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
    @foreach($taskList as $t)
    <tr>
      <td class="title">{{ $t->title }}</td>
      <td class="description">{{ $t->description }}</td>
      <td class="date">{{ $t->date }}</td>
      <td class="controls">
        @if($t->check == 0)
            <a href="/check/{{ $t->id }}"><i class="fa fa-check-circle" style="color: #c7d1c9;"></i></a>
        @else
            <a href="/check/{{ $t->id }}"><i class="fa fa-check-circle" style="color: green;"></i></a>
        @endif
            <a href="/edit/{{ $t->id }}"><i class="fa fa-pencil"></i></a>
            <a href="/delete/{{ $t->id }}"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

</div>
@endisset

</div>
@endsection