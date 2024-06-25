<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
class Task_Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description, //There is a question mark cause it can be a long data or long text be added 
        public bool $completed,
        public string $created_at,
        public string $updated_at,
    )
    {}
}

    Route::get('/', function(){
        return redirect()->route('tasks.index');
    });

    // This is the endpoint to display all the list 
    Route::get('/tasks', function () {
        return view('index', [
            // 'tasks'=> Task::latest()->where('completed', true)->get() // The Query Builder latest() and where(), the where() query builder makes the query fetch only the data that if the data is completed or equals to 1 and get() function will execute the query
            'tasks' => Task::latest()->get()
        ]);
    })->name('tasks.index');

    // The formation of this is a must because there are some times that it will execute some of the Routes before of that Routes Tasks
    Route::view('/tasks/create-form', 'create-form');

    // Redirect to the View edit.blade.php
    Route::get('/tasks/{task}/edit', function(Task $task){

        return view('edit', ['tasked'=> $task ]);

    })->name('tasks.edit');

    // with the variable tasked this will be going to use in the show.blade.php (and it will be called like this $tasked) to call the data that will be found in Task::findOrFail($id) which is the id in the Task Database
    Route::get('/tasks/{task}', function(Task $task){
        return view('show', ['tasked'=> $task]);
    })->name('tasks.show');

    // Adding a data in the create-form by calling the route -> route('tasks.store) in post using the name which is the name(tasks.store)
    Route::post('/tasks', function (TaskRequest $request){
        // dd($request->all()); 
        // $data = $request->validated();
        // $task -> title = $data['title'];
        // $task -> description = $data['description'];
        // $task -> long_description = $data['long_description'];
        // $task -> save();

            $task = Task::create($request->validated());

    // The paremeter in the tasks.show is the {task} in its paremeter which is the id of the task but it renamed as task so task == id 
        return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Added Successfully');
        // dd($request->all());
    })->name('tasks.store');


    Route::put('/tasks/{task}/edit', function (Task $task, TaskRequest $request){
        // dd($request->all());

        // $data = $request->validated();
        // $task -> title = $data['title'];
        // $task -> description = $data['description'];
        // $task -> long_description = $data['long_description'];
        // $task -> save();

        $task->update($request->validated());

        return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Updated Successfully');
        
    })->name('tasks.update');

        
    Route::delete('tasks/{task}', function(Task $task){
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
    })->name('tasks.destroy');
  
    // HTTP PROTOCOLS AND VERBS
    // GET, POST, PUT, DELETE 


        // If no Route exist then will redirect on this page or custom page for 404

    Route::fallback(function(){
            return view('error', [
                'name'=> 'Prince Nagac'
            ]);
        });

