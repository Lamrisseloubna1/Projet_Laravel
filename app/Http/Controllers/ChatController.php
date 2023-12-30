<?php
// App\Http\Controllers\ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Models\Message;


class ChatController extends Controller
{
    public function index()
    {
        // Récupérer tous les messages (à adapter selon vos besoins)

        return view('chat.test');
    }

    public function create()
    {
        // Afficher le formulaire de création de message (si nécessaire)
        return view('chat.create');
    }

    public function store(Request $request)
    {
        // Valider la requête
        // $this->validate($request, [
        //     'text' => 'required',
        // ]);
        $request->validate([
            'message' => 'required|string',
        ]);
        // Créer un nouveau message pour l'utilisateur authentifié
        $message = auth()->user()->messages()->create([
            'text' => $request->input('text'),
        ]);

        // Diffuser l'événement pour informer les clients du nouveau message
        broadcast(new MessageSent($message->user, $message));

        // Rediriger ou retourner une réponse selon vos besoins
        return redirect()->route('chat.show', $message->id);
    }

    public function show($id)
    {
        // Récupérer le message à afficher
        $message = Message::findOrFail($id);

        return view('chat.show', ['message' => $message]);
    }
}

