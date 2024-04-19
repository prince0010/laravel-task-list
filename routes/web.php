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

