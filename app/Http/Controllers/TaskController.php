<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    
        // public function create()
        // {

        // // Assuming you have authenticated user
        // $user = Auth::user();

        // // Retrieve tasks for the team of the currently authenticated user
        // $tasks = Task::where('team_id', $user->team->id)->get();

        // // Your existing code...

        // return view('your-view', ['tasks' => $tasks]);

    
        // }
       
       
        public function index()
        {

            $tasks = Task::all();
            return view('forms', ['tasks' => $tasks]);
          
        }
        
        
        
          public function show(Task $tasks)
        {
            $tasks = Task::all();
            return view('tasks.forms',['tasks' => $tasks]);

        }



        public function create()
       {

         return view('tasks.forms');

        }

        public function store(Request $request)

        {
            $task = new Task($request->all());
            auth()->user()->tasks()->save($task);

            return redirect()->route('tasks.index');

        }

        public function edit(Task $task)
        {
            // Assuming you have an "edit.blade.php" file in the "resources/views/tasks" directory
            return view('tasks.edit', compact('task'));
        }
               
        // public function update(Request $request, Task $task)
        // {
        //     // Validate the request
        //     $request->validate([
        //         'name' => 'required|max:255',
        //     ]);
        
        //     $task->update([

        //         'name' => $request->input('name'),
        //         // Add other fields as needed
        //     ]);
        
        //     // Redirect or respond as needed
        //     return redirect()->route('tasks.index')->with('success', 'Task updated successfully');

            
        // }
        

        
       
        // public function update(Request $request, Task $task)

        // {
        
        //     $task->update($request->all());
        //     return redirect()->route('tasks.index')->with('success', 'Task updated successfully');

        // }

        public function destroy(Task $task)

        {

            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');

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
     

     public function update(Request $request, Task $task)
     {
         $request->validate([
             'name' => 'required|max:255',
             // Add validation rules for other fields if needed
         ]);
     
         $task->update([
             'name' => $request->name,
             // Add other fields you want to update here
         ]);
     
         return redirect()->back()->with('success', 'Task updated successfully');
     }
     
    
    
    //    public function update(Request $request, Task $task)
    //    {

    //     $task->update($request->all());
    //     return redirect()->route('tasks.index')->with('success', 'Task updated successfully');

    //    }
    
    }

    // public function store(Request $request)
    // {
    //     // Valider les données du formulaire
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'due_date' => 'nullable|date',
    //     ]);

    //     // Créer une nouvelle tâche
    //     Task::create([
    //         'title' => $request->input('title'),
    //         'description' => $request->input('description'),
    //         'due_date' => $request->input('due_date'),
    //     ]);

    //     // Rediriger vers la page d'accueil ou une autre page après la création
    //     return redirect()->route('home')->with('success', 'Task created successfully!');
    // }
  
