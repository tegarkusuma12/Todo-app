<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();

        return response()->json([
            'success' => true,
            'message' => 'List Todo',
            'data' => $todos
        ],200);
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
        $todos = new Todo;
        $todos->date = $request->date;
        $todos->todo = $request->todo;
        $todos->date = $request->date;
        $todos->save();

        if($todos) {
            return response()->json([
                'success' => true,
                'message' => 'List Todo Created',
                'data' => $todos
            ],200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todos = Todo::findOrfail($id);

        return response()->json([
            'success' => true,
            'message' => 'List Todo',
            'data' => $todos
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $todos = Todo::findOrfail($todo->id);
        $todo->date = $request->date;
        $todo->todo = $request->todo;
        $todo->status = $request->status;
        $todos->save();

        if($todos) {
            return response()->json([
                'success' => true,
                'message' => 'Todo Updated',
            ],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todos = Todo::findOrfail($todo->id);

        if($todos) {
            //hapus data di database
            $todos->delete();
            //membuat response JSON
            return response()->json([
            'success' => true,
            'message' => 'Todo Deleted'
            ], 200);
            }
            
    }
}
