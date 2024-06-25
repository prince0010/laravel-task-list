@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')

<style>
    .error-message{
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')

    <!-- {{ $errors }} -->
    <!-- 2nd parameter the ['id' => $tasked-> id] -->

    <form action="{{route('tasks.update', ['task' => $tasked->id, 'title' => $tasked->title])}}" method="POST">

    <!-- This csrf is to protect the useer from another websites request in forms like phishing or smth more worst -->
    @csrf
    @method('PUT') <!-- We Use Method Directive or Directive Method since the HTML Forms is not supporting the other HTTP Verb. 
                        It only supports the POST and GET method Not the PUT and Delete HTTP Verb -->

    <div>
    <label for="title">
        Title
    </label>
    <input type="text" name="title" id="title" value="{{ $tasked->title }}" />
    @error('title') 
        {{ $message }}
    @enderror
    </div>
    <!--  start -->
    <div>
        <label for="description"> Description </label>
            <textarea name="description" id="description" rows="5"> {{ $tasked->description }}
                @error('description')
                    {{ $message }}
                @enderror
            </textarea>
    </div>

    <!-- end -->
    
    <div>
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10"> {{ $tasked->long_description }}
            @error('long_description')
                {{ $message }}
            @enderror
        </textarea>
    </div>

    <div>
        <button type="submit"> Edit Task </button>
    </div>
</form>


@endsection