<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionAddRequest;
use App\Models\Meeting;

class SubscriptionController extends Controller
{
    public function store(SubscriptionAddRequest $request)
    {
        Meeting::create($request->validated());
        return response()->json([
            'message' => 'Thanks for making a meeting request. Will meet you soon!'
        ]);
    }
}
