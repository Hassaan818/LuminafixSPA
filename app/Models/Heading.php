<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Heading extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
    public static function getImagePath($value)
    {
        return Storage::disk('s3')->url('public/headings/'.$value);
    }
}
