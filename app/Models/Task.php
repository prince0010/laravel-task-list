<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; // This is needed for cerearting a factory model it automatically created by this command php artisan make:factory 'name' --model='name of the model'

    protected $fillable = ['title', 'description', 'long_description']; // Make sure that you dont add the secret or password or sensitive information in the fillable 
    //Be careful sa mga properties dapat i define nimo ang mga properties as a fillable like kaning title, description, long_description
    // protected $guarded = ['secrets', 'password'];

    // We can Add Methods in our models the method is this toggleComplete() and every Model we will add in the folder
    public function toggleComplete(){
        // I used $this since it will be the $task in the toggle-complete route in web.php
        $this->completed = !$this->completed;
            $this->save();

            // This is like the $this is == $task in that specific route
            // $task->completed = !$task->completed;
            // $task->save();
    }

}

// <!-- The Task Model will be created same as with the migration file and it should be created at the same time with the migration so that it will be connected and it will have all the column data (like name, id, lastname, firstname, middlename) in the data table in the database -->