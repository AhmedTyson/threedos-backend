<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\post;
use app\Http\Resources\postResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //
        $posts = post::all();
        return response()->json(['success' => 'true', 'data' => new PostResource($posts)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        post::create($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        post::with('user')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        post::findOrFail($id)->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        post::delete($id);
    }
}
