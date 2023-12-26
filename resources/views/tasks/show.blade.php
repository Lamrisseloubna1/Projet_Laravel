<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
    <html>
       <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
          <title>Dashboard</title>
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

          <style>
                                    body {
        margin-top: 20px;
        font-family: 'Arial', sans-serif;
    }

    /* USER LIST TABLE */
    .user-list tbody td > img {
        position: relative;
        max-width: 50px;
        float: left;
        margin-right: 15px;
        border-radius: 50%;
    }
    .user-list tbody td .user-link {
        display: block;
        font-size: 1.2em;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }
    .user-list tbody td .user-subhead {
        font-size: 0.9em;
        font-style: italic;
        color: #777;
    }

    /* TABLES */
    .table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    .table th {
        background-color: #f5f5f5;
        color: #333;
    }
    .table-hover tbody tr:hover {
        background-color: #f0f8ff;
    }

          </style>
  <script defer="defer" src="main.js"></script></head>
  <body class="app">
  <h1>Task List</h1>
    
<div class="container">
<div class="row">
	<div class="col-lg-12">
		<div class="main-box clearfix">
			<div class="table-responsive">
        <!-- <table class="table user-list">
    <thead>
        <tr>
            <th>Task</th>
            <th class="text-center">Status</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Team</th>
        
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td class="user-link">{{ $task->title }}</td>
            <td class="text-center">{{ $task->description }}</td>
            <td class="text-center">{{ $task->status }}</td>
            <td class="text-center">{{ $task->due_date }}</td>
            <td class="text-center">{{ $task->created_at }}</td>
            <td class="text-center">{{ $task->updated_at }}</td>
           
          
        </tr>
        @endforeach    
    </tbody> 
    
</table>         -->
<table class="table user-list">
    <thead>
        <tr>
            <th class="text-center">Task</th>
            <th class="text-center">Status</th>
            <th class="text-center">Description</th>
            <th class="text-center">Due Date</th>
            <th class="text-center">Team</th>
            <th class="text-center">Created at</th>
            <th class="text-center">Updated at</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td class="user-link">
                {{ $task->title }}
            </td>
            <td class="text-center">
                {{ $task->status }}
            </td>
            <td class="text-center">
                {{ $task->description }}
            </td>
            <td class="text-center">
                {{ $task->due_date }}
            </td>
            <td class="text-center">
                {{ $task->team->name ?? 'N/A' }}
            </td>
            <td class="text-center">
                {{ $task->created_at }}
            </td>
            <td class="text-center">
                {{ $task->updated_at }}
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>