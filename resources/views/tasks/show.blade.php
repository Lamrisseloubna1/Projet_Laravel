<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>Status: {{ $task->status }}</p>
    <p>Description: {{ $task->description }}</p>
    <p>Due Date: {{ $task->due_date }}</p>
    <p>Assigned to: {{ $task->assignedUser->name ?? 'Unassigned' }}</p>
    <p>Team: {{ $task->team->name ?? 'N/A' }}</p>
@endsection
