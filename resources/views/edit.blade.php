@extends('layouts.app')

<!-- This is to make the Craete and Edit / Update form to become Reusable -->
<!-- The $tasked is in the Route tasks.edit since its 'tasked' => $task so in there the 'tasked' it is where the data from the create-form id is stored so here in this blade php it is 'task' => $tasked since we are passing 
the 'tasked' in the tasks.edit since it was stored there the data's from the create-form added in the database -->
@section('content')
@include('form', ['task' => $tasked])

@endsection