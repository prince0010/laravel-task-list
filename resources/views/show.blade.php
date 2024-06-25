<!-- The $tasks is the name of the second parameter in the web.php in the Route::get('/tasks/{id}', function($id) use($tasks) ENDPOINT. IT IS HERE return view('show', ['tasks' => $task ]); 
The 'tasks' there is the one who youll call inthe blade template or template iheritance for the common layout since the 'tasks' is set as a container in the $task function in the object array since it became object array because of the
collect() function -->

@extends('layouts.app')
@section('title', $tasked->title)

@section('content')
<div class="mb-4">
    <button>
        <a class="link" href="{{route('tasks.index')}}"><- Back </a>
    </button>
</div>
<div class="mb-4 text-slate-700"> {{ $tasked->description }} </div>

@if ($tasked->long_description)
@endif
    <div class="mb-4 text-slate-700"> 
    {{$tasked->long_description}}
    </div>
    <!-- <div>
        {{ $tasked->completed }}
    </div> -->
    <div>
        <p class="mb-4 text-slate-400 text-sm">
        {{ $tasked->created_at->diffForHumans() }} ● {{ $tasked->updated_at->diffForHumans() }}
        </p>
      
    </div>
    
    <p class="mb-4">
       @if ($tasked->completed)
       <span class="font-medium text-green-500">
        Completed 
        </span>
       @else
       <span class="font-medium text-red-500">
       Not Complete 
        </span>
   
       @endif
    </p>

    <div class="flex gap-2">
        
          <!-- EDIT -->
          <a href="{{route('tasks.edit', ['task' => $tasked])}}" class="btn mb-2" >Edit </a>
        

        <!-- TOGGLE COMPLETE -->
        <form method="POST" action="{{route('tasks.toggle-complete', ['task' => $tasked])}}">
        @csrf
        @method('PUT')
        
            <button class="mb-2 btn" type="submit">
                Marked as {{ $tasked->completed ? 'Completed' : 'Not Complete' }}
            </button>

    </form>
       

        <!-- DELETE -->
        
        <!-- $tasked is from the parameter of the ['tasked'=> $task] in the tasks.show route in web.php it called the properties or attributes in the database or in the model  -->
        <form action="{{route('tasks.destroy', ['task' => $tasked]) }}" method="POST">
            @csrf
            @method('DELETE') 
            <!-- We used method() sniffing since the method in form is only for the POST and PUT no DELETE and PUT -->
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
