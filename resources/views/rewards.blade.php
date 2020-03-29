@extends('layouts.app')

@section('content')
<div class="wrap-content">
<h2 class="title">Available Rewards</h2>
    <div class="menu-select">
        <a href="/" class="btn btn-primary">Today's task</a>
        <a href="/checked" class="btn btn-success">Checked task</a>
        <a href="/unchecked" class="btn btn-warning">Unchecked task</a>
        <a href="/rewards" type="button" class="btn btn-light">
            Rewards @isset($rewards) @if(count($rewards) != 0)<span class="badge badge-danger">{{ count($rewards) }}</span> @endif @endisset
        </a>
    </div>
</div>

<table>
  <thead>
    <tr>
      <th>Reward</th>
      <th>Task</th>
      <th>Date</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rewards as $r)
    <tr>
      <td class="reward">{{ $r->reward }}</td>
      <td class="title">{{ $r->title }}</td>
      <td class="date">{{ $r->date }}</td>
      <td class="controls">
        @if($r->reward_check == 0)
            <a href="/rewardcheck/{{ $r->id }}"><i class="fa fa-check-circle" style="color: #c7d1c9;"></i></a>
        @else
            <a href="/rewardcheck/{{ $r->id }}"><i class="fa fa-check-circle" style="color: green;"></i></a>
        @endif
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection