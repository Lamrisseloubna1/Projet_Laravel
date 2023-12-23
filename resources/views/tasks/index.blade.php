<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Task List</h1>

    @foreach($tasks as $task)
        <p>{{ $task->title }}</p>
        <!-- Afficher d'autres détails de la tâche si nécessaire -->
    @endforeach
@endsection

