<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form id="editTaskModal" action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Task</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                            </div>

                            <!-- Add more form fields based on your Task model -->

                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
