<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                    <form id="editTaskForm" action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <!-- Add your form fields here based on your Task model -->

                            <div class="form-group">
                                <label for="name">Task Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
                            </div>



                            <!-- Add more form fields based on your Task model -->

                            <button type="submit"  data-task-id="{{ $task->id }}" class="btn btn-primary">Update Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
