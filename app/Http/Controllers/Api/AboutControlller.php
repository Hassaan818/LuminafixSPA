<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutCreateRequest;
use App\Http\Requests\AboutUpdateRequest;
use App\Http\Resources\AboutResource;
use App\Models\About;

class AboutControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AboutResource(About::first());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutCreateRequest $request)
    {
        $validatedData = $request->validated();
        $about = About::create($validatedData);
        return (new AboutResource($about))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        return AboutResource::make($about);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutUpdateRequest $request, About $about)
    {
        $validatedData = $request->validated();
        $about->update($validatedData);
        return (new AboutResource($about))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->delete();
        return response()->json([
            'message' => 'about deleted successfully'
        ]);
    }
}
