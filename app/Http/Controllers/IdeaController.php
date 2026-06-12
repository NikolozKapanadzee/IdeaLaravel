<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreideaRequest;
use App\Http\Requests\UpdateideaRequest;
use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ideas = Auth::user()
            ->ideas()
            ->when($request->status, fn($query, $status) => $query->where('status', $status))
            ->get();



        return view('idea/index', [
            'ideas' => $ideas,
            'statusCounts' => Idea::statusCounts(Auth::user())
        ]);
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
    public function store(StoreideaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(idea $idea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(idea $idea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateideaRequest $request, idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(idea $idea)
    {
        //
    }
}
