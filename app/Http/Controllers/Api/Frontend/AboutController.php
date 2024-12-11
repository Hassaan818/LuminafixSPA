<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Http\Resources\TeamResource;
use App\Models\About;
use App\Models\Team;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return response()->json([
            'about' => new AboutResource($about),
            'team' => TeamResource::collection(Team::get    ())
        ]);
    }
}
