<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with("category")->get();
        return response()->json([
            "status" => "success",
            "message" => "Task list",
            "data" => TaskResource::collection($tasks)
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        
        return response()->json([
            "status" => "success",
            "message" => "Task created",
            "data" => new TaskResource($task->load("category"))
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id)->load("category");
        return response()->json([
            "status" => "success",
            "message" => "Task details",
            "data" => new TaskResource($task),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());

        return response()->json([
            "status" => "success",
            "message" => "Task updated",
            "data" => new TaskResource($task->load("category"))
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        
        return response()->json([
            "status" => "success",
            "message" => "Task deleted",
            "data" => null
        ], 200);
    }
}
