<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamAddRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TeamResource::collection(Team::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamAddRequest $request)
    {
        $validatedData = $request->validated();
        if($validatedData['image']) {
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('main_teams_uploads', $filename, 'public');
            $validatedData['image'] =  $filename;
        }
        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Team::generateSlug($validatedData['name']),
            ]
            );
        $team = Team::create($updatedRequest);
        return (new TeamResource($team))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $slug)
    {
        return TeamResource::make($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, Team $slug)
    {
        $validatedData = $request->validated();
        if(isset($validatedData['image']) && $validatedData['image']->getClientOriginalName()) {
            if (isset($slug->image) && !empty($slug->image)) {
                Storage::delete('/public/main_teams_uploads/' . $slug->image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('main_teams_uploads', $filename, 'public');
            $validatedData['image'] =  $filename;
        }
        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Str::slug($validatedData['name']),
            ]
        );
        $slug->update($updatedRequest);
        return (new TeamResource($slug))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $slug)
    {
        if($slug->delete()){
            Storage::delete('/public/main_teams_uploads/'.$slug->image);
        };

        return response()->json(['message' => 'Team Deleted Successfully']);
    }
}
