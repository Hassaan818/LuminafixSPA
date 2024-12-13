<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewAddRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReviewResource::collection(Review::active()->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewAddRequest $request)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image'])) {
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('public/reviews/', $filename, 's3');
            $validatedData['image'] =  $filename;
        }
        $review = Review::create($validatedData);
        return (new ReviewResource($review))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return ReviewResource::make($review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image'])) {
            if (isset($review->image) && !empty($review->image)) {
                Storage::disk('s3')->delete('public/reviews/'.$review->image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('public/reviews/', $filename, 's3');
            $validatedData['image'] =  $filename;
        }
        $review->update($validatedData);
        return (new ReviewResource($review))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {       
        if($review->delete()) {
            Storage::disk('s3')->delete('public/reviews/'.$review->image);
        }
        return response()->json([
            'message' => 'Review Deleted Successfully'
        ]);
    }
}
