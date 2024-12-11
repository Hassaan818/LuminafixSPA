<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\HeadingResource;
use App\Models\Blog;
use App\Models\Heading;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return BlogResource::collection(Blog::with('team')->paginate(6));
    }

    public function BlogDetails(Blog $slug)
    {
        $blog = Blog::with('headings')->findOrFail($slug->id);
        return BlogResource::make($blog);
    }

    public function relatedBlogs()
    {
        return BlogResource::collection(Blog::orderBy('created_at')->limit(3)->get());
    }
}
