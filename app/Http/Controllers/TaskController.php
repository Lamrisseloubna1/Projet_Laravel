<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
   
   /* public function create()
    {

             // Get the currently authenticated user
    // $user = Auth::user();

    // // Check if the user is an admin and has a team
    // if ($user->is_admin && $user->team) {
    //     // Fetch tasks related to the admin's team
    //     $tasks = Task::where('team_id', $user->team->id)->get();
    // } else {
    //     // If the user is not an admin or doesn't have a team, fetch all tasks
    //     $tasks = Task::all();
    // }

    // return view('tasks.create', ['tasks' => $tasks]);
 
    // }
    
    }*/
   
    public function create()
{
    $user = Auth::user();

    if ($user->is_admin && $user->teams()->exists()) {
        $tasks = Task::whereIn('assigned_to', $user->teams->pluck('id'))->with('assignedUser')->get();

        return view('tasks.create', ['tasks' => $tasks]);
    }
}

    
    public function edit(Task $task)
    {
        // Display the form to edit an existing task
    }
    
    public function update(Request $request, Task $task)
    {
        // Update the task in the database
    }
    
    public function destroy(Task $task)
    {
        // Delete the task from the database
    }

    public function show()

    {
       // Get the currently authenticated user
        $user = Auth::user();
        $tasks = $user->tasks()->with('team')->get();

    return view('tasks.forms', ['tasks' => $tasks]);
         // Get the currently authenticated user
        //   $user = Auth::user();

        //  // Check if the user is an admin and has a team
        // if ($user->is_admin && $user->team) {
        // // Retrieve tasks related to the team
        // $tasks = $user->team->tasks()->with('team')->get();

        // return view('tasks.forms', ['tasks' => $tasks]);
        // }
       
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
