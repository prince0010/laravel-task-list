<?php

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
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at,
    ){
    }
}


Route::get('/', function(){
    return redirect()->route('tasks.index');
});

// This is the endpoint to display all the list 
Route::get('/tasks', function () {
    return view('index', [
        // 'tasks'=> Task::latest()->where('completed', true)->get() // The Query Builder  latest() and where(), the where() query builder makes tghe query fetch only the data that if the data is completed or equals to 1 and get() will execute the query
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

// The formation of this is a must because there are some times that it will execute some of the Routes before of that Routes Tasks
Route::view('/tasks/create-form', 'create-form');

Route::get('/tasks/{id}', function($id){

    return view('show', ['tasked'=> Task::findOrFail($id)]);

})->name('tasks.show');


Route::post('/tasks', function (Request $request){
    // dd($request->all());

    $data = $request->validate(
        [
            'title' =>'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]
    );

    $task = new Task;
    $task -> title = $data['title'];
    $task -> description = $data['description'];
    $task -> long_description = $data['long_description'];

    $task -> save();

    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');
// HTTP PROTOCOLS
// GET, POST, PUT, DELETE 


    // If no Route exist then will redirect on this page or custom page for 404

Route::fallback(function(){
        return view('error', [
            'name'=> 'Prince Nagac'
        ]);
    });

