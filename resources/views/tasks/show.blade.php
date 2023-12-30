<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Task List</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
            margin-top: 20px;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            text-align: center;
            color: #2aa493;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            background-color: #f5f5f5;
            color: #333;
        }

        .table th {
            position: relative;
            font-weight: bold;
            background-color: #2aa493;
            color: #fff;
        }

        .table th span {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 5px;
        }

        .table th i {
            margin-right: 5px;
        }

        .table-hover tbody tr:hover {
            background-color: #d4edda;
        }

        .user-link {
            display: flex;
            align-items: center;
            font-weight: bold;
            color: #2aa493;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .user-link:hover {
            color: #155724;
        }

        .status-icon {
            font-size: 1.2em;
            margin-right: 5px;
        }

        .checkbox-container {
            text-align: center;
        }
               
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <span><i class="fa fa-tasks status-icon"></i> Task</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-info-circle status-icon"></i> Status</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-align-left status-icon"></i> Description</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-clock-o status-icon"></i> Due Date</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-users status-icon"></i> Team</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-calendar status-icon"></i> Created at</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-refresh status-icon"></i> Updated at</span>
                                    </th>
                                    <th class="text-center">
                                        <span><i class="fa fa-check-square status-icon"></i> Select status</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td class="user-link">
                                        {{ $task->title }}
                                    </td>
                                    <td>
                                        {{ $task->status }}
                                       
                                        <!-- Display the actual status -->
                                         <!-- {{ ucfirst($task->status) }} -->
       
                                    </td>
                                    <td>
                                        {{ $task->description }}
                                    </td>
                                    <td>
                                        {{ $task->due_date }}
                                    </td>
                                    <td>
                                        {{ $task->team->name ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $task->created_at }}
                                    </td>
                                    <td>
                                        {{ $task->updated_at }}
                                    </td>
                                    <td class="checkbox-container">
                                         <!-- Add a form to update the task status -->
                                        <form method="post" action="{{ route('tasks.updateStatus', ['task' => $task]) }}">
                                          @csrf
                                          @method('patch')
                                           <select name="status" onchange="this.form.submit()">
                                           @foreach(['pending', 'completed', 'in_progress'] as $status)
                                                <option value="{{ $status }}" {{ $task->status === $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

