<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeadingAddRequest;
use App\Http\Requests\HeadingUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\HeadingResource;
use App\Models\Blog;
use App\Models\Heading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeadingController extends Controller
{
    //all Blogs For Heading Edit Page
    public function blogs()
    {
        return BlogResource::collection(Blog::query()->with('team')->get());
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HeadingResource::collection(Heading::with('blog')->paginate(6));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeadingAddRequest $request)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image']) && $validatedData['image']->getClientOriginalName()) {
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('public/headings', $filename, 's3');
            $validatedData['image'] =  $filename;
        }
        $heading = Heading::create($validatedData);
        return (new HeadingResource($heading))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Heading $heading)
    {
        return HeadingResource::make($heading);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeadingUpdateRequest $request, Heading $heading)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image']) && $validatedData['image']->getClientOriginalName()) {
            if (isset($heading->image) && !empty($heading->image)) {
                Storage::disk('s3')->delete('public/headings/'.$heading->image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('public/headings/', $filename, 's3');
            $validatedData['image'] =  $filename;
        }
        $heading->update($validatedData);
        return (new HeadingResource($heading))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Heading $heading)
    {
        if ($heading->delete()) {
            Storage::disk('s3')->delete('public/headings/'.$heading->image);
        }
        return response()->json(['message' => 'Heading Deleted Successfully']);
    }
}
