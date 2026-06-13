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
        $user = Auth::user();

        $ideas = $user
            ->ideas()
            ->when(in_array($request->status, IdeaStatus::values()), fn($query) => $query->where('status', $request->status))->latest()
            ->get();

        return view('idea.index', [
            'ideas' => $ideas,
            'statusCounts' => Idea::statusCounts($user),
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
        $idea = Auth::user()->ideas()->create($request->safe()->except("steps"));

        $idea->steps()->createMany(
            collect($request->steps)->map(fn($step) => ['description' => $step])->toArray()
        );


        return to_route("idea.index")->with("success", "Idea created");
    }

    /**
     * Display the specified resource.
     */
    public function show(idea $idea)
    {
        return view("idea/show", [
            "idea" => $idea
        ]);
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
        $idea->delete();
        return redirect("/ideas");
    }
}
