<!-- The $tasks is the name of the second parameter in the web.php in the Route::get('/tasks/{id}', function($id) use($tasks) ENDPOINT. IT IS HERE return view('show', ['tasks' => $task ]); 
The 'tasks' there is the one who youll call inthe blade template or template iheritance for the common layout since the 'tasks' is set as a container in the $task function in the object array since it became object array because of the
collect() function -->


<h1> {{ $tasks-> title }}</h1>
<p> {{ $tasks-> description }}</p>

@if ($tasks->long_description)
    <p> {{ $tasks->long_description }} </p>
@endif

<p> {{ $tasks-> created_at }}</p>
<p> {{ $tasks-> updated_at }}</p>