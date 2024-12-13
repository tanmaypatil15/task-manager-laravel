@extends('backend.layouts.master')
@section('title')
New To do App
@endsection

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success mt-4">

        {{ session()->get('success') }}

    </div>
@endif
<div class="row mt-3">
    <div class="col-12 align-self-center">
<a href="{{ route("logout.check") }}" style="color: cornflowerblue"></a>

        <ul class="list-group">
<a href="{{ route("logout.check") }}" style="color: cornflowerblue">logout</a>

            @foreach($todos as $todo)
                <li class="list-group-item"><a href="details" style="color: cornflowerblue">{{$todo->title}}</a></li>
                <li class="list-group-item"><a href="details" style="color: cornflowerblue">{{$todo->description}}</a></li>

            @endforeach
        </ul>
    </div>
</div>
@endsection
