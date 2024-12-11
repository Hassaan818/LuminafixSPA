<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicePageAddRequest;
use App\Http\Requests\ServicePageUpdateRequest;
use App\Http\Resources\ServicePageResource;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ServicePageResource(ServicePage::first());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicePageAddRequest $request)
    {
        $validatedData = $request->validated();
        $service = ServicePage::create($validatedData);
        return (new ServicePageResource($service))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicePage $servicePage)
    {
        return new ServicePageResource($servicePage);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicePageUpdateRequest $request, ServicePage $servicePage)
    {
        $validatedData = $request->validated();
        $servicePage->update($validatedData);
        return (new ServicePageResource($servicePage))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicePage $servicePage)
    {
        $servicePage->delete();
        return response()->json('no content');
    }
}
