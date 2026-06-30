<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::with("category")->get();
        return response()->json([
            "status" => "success",
            "message" => "Task list",
            "data" => new $tasks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $task = Task::create($request->all());
        return response()->json([
            "status" => "success",
            "message" => "Task created",
            "data" => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        $task = Task::findOrFail($task)->load("category");
        return response()->json([
            "status" => "success",
            "message" => "Task details",
            "data" => $task,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $task= Task::findOrFail($task)->update($request->all())->load("category");
        return response()->json([
            "status" => "success",
            "message" => "Task updated",
            "data" => $task
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            "status" => "success",
            "message" => "Task deleted",
            "data" => $task
        ], 200);
    }
}
