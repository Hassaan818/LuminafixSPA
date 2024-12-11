<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        return asset('storage/main_headings_uploads/' . $value);
    }
}
