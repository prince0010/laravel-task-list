@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
    {{ $errors }}
    <form action="{{route('tasks.store')}}" method="POST">
    <!-- This csrf is to protect the useer from another websites request in forms like phishing or smth more worst -->
    @csrf

    <div>
    <label for="title">
        Title
    </label>
    <input type="text" name="title" id="title" />

    </div>
    
    <div>
        <label for="description">
        Description     
    </label>
            <textarea name="description" id="description" rows="5"></textarea>
    </div>

    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
    </div>

    <div>
        <button type="submit"> Add Task </button>
    </div>
</form>


@endsection