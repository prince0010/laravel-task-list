<center>
<h1>
    This a Task List
</h1>

<div>
    <!-- Tasked is the variable name used in the web.php in order to call the values in the tasks array -->
    <!-- @if(count($tasks)) -->
    @forelse ( $tasks as $task)
    <div>
        <!-- tasks.show is the name of the endpoint in the web.php -->
    <a href="{{ route('tasks.show', ['id' => $task->id, 'title' => $task->title]) }}">
    {{$task->title}}
</a>    
    </div>
    <div> {{$task->description}}</div>
    <div> {{$task->long_description}}</div>
    <div> {{$task->completed}}</div>
    <div> {{$task->created_at}}</div>
    <div> {{$task->updated_at}}</div>
    <br>
    @empty
    <div> There are no task! </div>
    @endforelse
   
    <!-- @endif -->
</div>

</center>