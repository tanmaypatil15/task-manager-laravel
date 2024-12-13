@extends('layouts.master')

@section('title')
    Details
@endsection

@section('content')

    <div class="card text-center mt-5">
        <div class="card-header">
            <b>TODO DETAILS</b>
        </div>
        <div class="card-body">
            <h5 class="card-title">Todo name here</h5>
            <p class="card-text">Todo description here.</p>
            <a href="edit"><span class="btn btn-primary">Edit</span></a>
            <a href="delete"><span class="btn btn-danger">Delete</span></a>
        </div>
    </div>

@endsection