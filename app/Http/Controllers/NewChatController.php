<?php

namespace App\Http\Controllers;
use App\Events\ChatMessageEvent; 
use Illuminate\Http\Request;

class NewChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('chat.test');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        event(new ChatMessageEvent (
            $request->nickname,
            $request->message));

        return response()->json([
            'success'=>'message sent.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}