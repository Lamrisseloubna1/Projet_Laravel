<?php

namespace App\Http\Controllers;

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
        $tasks = Task::all();
        return view('tasks.show',['tasks' => $tasks]);
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
