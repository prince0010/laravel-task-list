@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')


@endsection
@section('content')
    <!-- {{ $errors }} -->
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id] ) : route('tasks.store')}}" method="POST">
    <!-- This csrf is to protect the useer from another websites request in forms like phishing or smth more worst -->
    @csrf
    @isset($task)
    @method('PUT')
    @endisset
    <div class ="mb-4">
    <label for="title">
        Title
    </label>
    <!-- Class conditional directive if the border has an erorr $errors [the $errors is a special variable in the Laravel, which is a collection that has a method called has()] then it will display the border-red-500 and it must be specific of the $error for it to displays the red border
        so you must add has() after the $errors to specify what element here in the form that will make the border-red-500 displays or if it checks the errors of the example 'title' we want this error applied [border-red-500]-->
    <input type="text" name="title" id="title" value="{{ $task->title ?? old('title')}}"
     @class(['border-red-500' => $errors->has('title')])>
     <!--  or you can use this kind of class you can choose between this bot class. Its either this class on the top or this class in the bottom the comment part-->
     <!-- class = "@error('title') border-red-500 @enderror border" -->

    @error('title')
    <p class='error'>
      {{ $message }}
      </p> 
    @enderror
    </div>
    
    <div class ="mb-4">
        <label for="description">
        Description     
    </label>
            <textarea name="description" id="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description')}}</textarea>
            @error('description')
            <p class='error '>
     {{ $message }}
      </p> 
    @enderror
    </div>

    <div class ="mb-4">
        <label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])> {{ $task->long_description ?? old('long_description')}}</textarea>
        @error('long_description')
      <p class='error'>
      {{ $message }}
      </p> 
    @enderror
    </div>

    <div class="flex items-center gap-2">
        <button class="btn" type="submit"> 
            @isset($task)
            Update Task   
            @else
            Add Task      
            @endisset    
        </button>
        <a href="{{route('tasks.index')}}" class="link"> Cancel</a>
    </div>
</form>

@endsection