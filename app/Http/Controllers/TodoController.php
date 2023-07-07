<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Visszaadja az összes teendőt.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    /**
     * Létrehoz egy új teendőt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'due_date' => 'date',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    /**
 * Visszaadja a megadott teendő részleteit.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    try {
        $todo = Todo::findOrFail($id);
        return response()->json($todo);
    } catch (\Exception $e) {
        return response()->json(['error' => 'A teendő nem található.'], 404);
    }
}

/**
 * Frissíti a megadott teendő adatait.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    try {
        $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'due_date' => 'date',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return response()->json($todo);
    } catch (\Exception $e) {
        return response()->json(['error' => 'A teendő nem található.'], 404);
    }
}

/**
 * Törli a megadott teendőt.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    try {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(null, 204);
    } catch (\Exception $e) {
        return response()->json(['error' => 'A teendő nem található.'], 404);
    }
}
}
