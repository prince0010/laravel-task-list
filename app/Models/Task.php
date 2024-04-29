<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; // This is needed for cerearting a factory model it automatically created by this command php artisan make:factory 'name' --model='name of the model'
}
