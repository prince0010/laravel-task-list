@extends('layouts.app')

<center>

@section('title','List Task Application')

@section('content')

@foreach ($tasks as $task )
    
    <div>
        <h3>
        <a href=" 
        
        {{

        route('tasks.show', ['task' => $task -> id])
        
        }} 
        
        ">

        {{ $task->title }}
        
    </a>
        </h3>
       
    </div>
    <div>
        {{ $task->description }}
    </div>
@endforeach

   

</center>
@endsection