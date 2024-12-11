<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicePageResource;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() 
    {
        return response()->json([
            'servicePage' => new ServicePageResource(ServicePage::first()),
            'webServices' => ServicesResource::collection(Service::where('category', 'webDevelopment')->get()),
            'amazon' => ServicesResource::collection(Service::where('category', 'amazon')->get()),
            'digitalMarketing' => ServicesResource::collection(Service::where('category', 'digitalMarketing')->get()),
        ]);
    }

    public function singleService(Service $slug)
     {
        return new ServicesResource($slug);
     }
}
