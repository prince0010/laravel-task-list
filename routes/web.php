<?php

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

$task = [
    
    new Task_Data(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),

    new Task_Data(
        2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
    ),

    new Task_Data(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),

    new Task_Data(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];



Route::get('/', function () {
    return view('welcome');
});

// HTTP PROTOCOLS
// GET, POST, PUT, DELETE 

Route::get('/page/{name}', function($name){
    return 'Hello ' . $name . "!";
});

Route::get('/ttt', function(){
    return 'Hello this is test';
})->name('hellotest1');


// Mas chada ang naay redirect na naas ka same domain name sa gina redirect gamay or ginagamit pang search for even though lahi ma type sa user mu redirect japon sa katong website route na gina redirect

Route::get('/HelloTest2', function(){
    
    return redirect()->route('hellotest1');
    });

    Route::get('/Testtt', function(){

        return view('error', [
            'name' => 'Prince Nagac',
        ]);
    });
    // If no Route exist then will redirect on this page or custom page for 404

Route::fallback(function(){
        return view('error');
    });

