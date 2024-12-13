@extends('frontend.layouts.master')
@section('title')
Todo App
@endsection

@section('content')

<form action="store-data" method="post" class="mt-4 p-4">
    @csrf
    <div class="form-group m-3">
        <label for="name">Todo Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group m-3">
        <label for="description">Todo Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group m-3">
        <label for="completed">Completed</label>
        <input type="checkbox" id="completed" name="completed" value="1"><br><br>
    </div>
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Create">
    </div>
</form>

@endsection