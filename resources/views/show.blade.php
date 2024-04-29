<!-- The $tasks is the name of the second parameter in the web.php in the Route::get('/tasks/{id}', function($id) use($tasks) ENDPOINT. IT IS HERE return view('show', ['tasks' => $task ]); 
The 'tasks' there is the one who youll call inthe blade template or template iheritance for the common layout since the 'tasks' is set as a container in the $task function in the object array since it became object array because of the
collect() function -->

@extends('layouts.app')
<center>
@section('title', $tasked->title)

@section('content')

<div> {{ $tasked->description }} </div>

@if ($tasked->long_description)
@endif
    <div> 
    {{$tasked->long_description}}
    </div>
    <!-- <div>
        {{ $tasked->completed }}
    </div> -->
    <div>
        {{ $tasked->created_at }}
    </div>
    <div>
        {{ $tasked->updated_at }}
    </div>

</center>
@endsection
