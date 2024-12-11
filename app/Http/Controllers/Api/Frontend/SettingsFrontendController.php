<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Review;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsFrontendController extends Controller
{
    public function index()
    {
        return response()->json([
            'setting' => Setting::first(),
            'services' => Service::orderBy('created_at')->active()->limit(6)->get(),
            'blogs' => Blog::orderBy('created_at')->active()->limit(6)->get(),
            'reviews' => Review::orderBy('created_at')->limit(10)->get()
        ]);
    }
}
