<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceAddRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ServicesResource::collection(Service::paginate(5));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceAddRequest $request)
    {
        $validatedData = $request->validated();
        $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
        $validatedData['image']->storeAs('main_services_uploads', $filename, 'public');
        $validatedData['image'] =  $filename;
        $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['detail_page_image']->getClientOriginalName());
        $validatedData['detail_page_image']->storeAs('main_services_uploads', $filename, 'public');
        $validatedData['detail_page_image'] =  $filename;
        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Service::generateSlug($validatedData['title']),
            ]
        );
        $service = Service::create($updatedRequest);
        return (new ServicesResource($service))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $slug)
    {
        return ServicesResource::make($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceUpdateRequest $request, Service $slug)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['image']) && $validatedData['image']->getClientOriginalName()) {
            if (isset($slug->image) && !empty($slug->image)) {
                Storage::delete('/public/main_services_uploads/' . $slug->image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['image']->getClientOriginalName());
            $validatedData['image']->storeAs('main_services_uploads', $filename, 'public');
            $validatedData['image'] =  $filename;
        }
        if (isset($validatedData['detail_page_image']) && $validatedData['detail_page_image']->getClientOriginalName()) {
            if (isset($slug->detail_page_image) && !empty($slug->detail_page_image)) {
                Storage::delete('/public/main_services_uploads/' . $slug->detail_page_image);
            }
            $filename = time() . rand(1, 100) . '_' . str_replace(['"', "'"], "", $validatedData['detail_page_image']->getClientOriginalName());
            $validatedData['detail_page_image']->storeAs('main_services_uploads', $filename, 'public');
            $validatedData['detail_page_image'] =  $filename;
        }
        $updatedRequest = array_merge(
            $validatedData,
            [
                'slug' => Str::of($validatedData['title'])->slug('-'),
            ]
        );
        $slug->update($updatedRequest);
        return (new ServicesResource($slug))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $slug)
    {
        if ($slug->delete()) {
            Storage::delete('/public/main_services_uploads/' . $slug->image);
            Storage::delete('/public/main_services_uploads/' . $slug->detail_page_image);
        };

        return response()->json(['message' => 'Service Deleted Successfully']);
    }
}
