@extends('layouts.app')


@section('title','List Task Application')

@section('content')

<nav class="mb-4">
    <button>
        <a href="{{route('tasks.create')}}" class = "link"> Create Task </a>
    </button>
</nav class="mb-4">
@foreach ($tasks as $task )
    
    <div>
        <h3>
             <!-- This will redirect us in the page of show.blade.php where it will display the specific details that is created by adding the ID in the a tag which will help us to make it link to its actual data and 
    it is needed if you have this kind of redirecting to a specific route -->
        <a href=" 
        {{
        route('tasks.show', ['task' => $task -> id])
        }}"
            @class([ 'font-semibold ' ,'font-bold' => $task->completed, 'line-through text-gray-400' => $task->completed])
        >
        <!-- the @class(['font-bold' => $task->completed, 'line-through' => $task->completed]) it is a class directive in the blade directive, you can add some conditional classes here like in this class directive -->

        {{ $task->title }}
    </a>
        </h3>
    </div>
    <div>
        {{ $task->description }}
    </div>
@endforeach

   @if ($tasks->count())
       <nav class="mt-4">
        {{ $tasks->links() }}
       </nav>
   @endif

@endsection