<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodoController extends Controller
{

    public function sortAlphabetically()
{
    $todos = Todos::orderBy('data', 'asc')->get();
    return response()->json($todos);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todos::all();
        return response()->json($todos);
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
        $todo = new Todos;
        $todo->data = $request->input('data');
        $todo->save();

        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            return response()->json($todo);
        } else {
            return response()->json(['error' => 'Задача не найдена'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            $todo->data = $request->input('data');
            $todo->save();

            return response()->json($todo);
        } else {
            return response()->json(['error' => 'Задача не найдена'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            $todo->delete();

            return response()->json(['message' => 'Задача удалена']);
        } else {
            return response()->json(['error' => 'Задача не найдена'], 404);
        }
    }
}
