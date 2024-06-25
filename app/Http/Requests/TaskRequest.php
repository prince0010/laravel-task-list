<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // It should be set as a true if you want this request or authorization to run in a specific route
     
    }

       // And it must only be used in create and update the reusable one
       // And pwede ra ma add ang kani na mga properties or ma reusable sa web.php or sa routes if same silag mga required og mga properties like title, description, long_description
        // Ayha rani magamit or ma reusable sa specific routes sa web.php or routes if same silang required og mga properties such as ani is ang title, description og long_description then ma reusable dayon ni siya sa web.php sa specific routes
       public function rules(): array
    {
        return  [
            'title' =>'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ];
    }
}
