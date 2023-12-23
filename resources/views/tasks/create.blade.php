<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf

        <label for="title">Task Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Task Description:</label>
        <textarea id="description" name="description"></textarea>

        <label for="due_date">Due Date:</label>
        <input type="date" id="due_date" name="due_date">

        <button type="submit">Create Task</button>
    </form>
@endsection
