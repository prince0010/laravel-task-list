<center>
<h1>
    This a Task List
</h1>

<div>
    <!-- Tasked is the variable name used in the web.php in order to call the values in the tasks array -->
    <!-- @if(count($tasked)) -->
    @forelse ( $tasked as $tasks)
    <div>
    <a href="{{ route('tasks.show', ['id' => $tasks->id, 'title' => $tasks->title]) }}">
    {{$tasks->title}}
</a>    
    </div>
    <div> {{$tasks->description}}</div>
    <div> {{$tasks->long_description}}</div>
    <div> {{$tasks->completed}}</div>
    <div> {{$tasks->created_at}}</div>
    <div> {{$tasks->updated_at}}</div>
    <br>
    @empty
    <div> There are no task! </div>
    @endforelse
   
    <!-- @endif -->
</div>

</center>