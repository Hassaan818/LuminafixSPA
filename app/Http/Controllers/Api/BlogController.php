<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogAddRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Resources\BlogResource;
use App\Http\Resources\TeamResource;
use App\Models\Blog;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BlogResource::collection(Blog::query()->with('team')->paginate(5));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogAddRequest $request)
    {
        $validatedData = $request->validated();
        if ($validatedData['image']) {
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('main_blogs_uploads', $filename, 'public');
            $validatedData['image'] =  $filename;
        }
        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Str::slug($validatedData['title']),
            ]
        );
        $blog = Blog::create($updatedRequest);
        return (new BlogResource($blog))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $slug)
    {
        return BlogResource::make($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $slug)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image']) && $validatedData['image']->getClientOriginalName()) {
            if (isset($slug->image) && !empty($slug->image)) {
                Storage::delete('/public/main_blogs_uploads/' . $slug->image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('main_blogs_uploads', $filename, 'public');
            $validatedData['image'] =  $filename;
        }

        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Str::slug($validatedData['title']),
            ]
        );
        $slug->update($updatedRequest);
        return (new BlogResource($slug))->response()->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $slug)
    {
        if ($slug->delete()) {
            Storage::delete('/public/main_blogs_uploads/' . $slug->image);
        }
        return response()->json([
            'message' => 'Blog Deleted!'
        ]);
    }
}
