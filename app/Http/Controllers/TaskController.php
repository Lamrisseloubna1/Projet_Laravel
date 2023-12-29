<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
   

//     public function index()
// {
//     $tasks = Task::all();

//     return view('tasks.show', ['tasks' => $tasks]);
// }

    // public function index()
    // {
    //     $tasks = Task::all();
    //     return view('tasks.index', compact('tasks'));
    // }
    public function create()
    {
        return view('tasks.create');
    }

    public function show()

    {
       
        // Get the currently authenticated user
        $user = Auth::user();
         $tasks = $user->tasks()->with('team')->get();

    return view('tasks.forms', ['tasks' => $tasks]);
       
    }
    
    public function updateStatus(Request $request, Task $task)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:pending,completed,in_progress',
        ]);

        // Update the task status
        $task->update(['status' => $request->status]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
    // public function markCompleted(Task $task)
    // {
    //     // Add logic to mark the task as completed
    //     $task->update(['status' => 'completed']);

    //     // Redirect back or to the task list page
    //     return redirect()->back()->with('success', 'Task marked as completed.');
    // }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Créer une nouvelle tâche
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
        ]);

        // Rediriger vers la page d'accueil ou une autre page après la création
        return redirect()->route('home')->with('success', 'Task created successfully!');
    }
}
