<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public static function getImagePath($value)
    {
        return asset('storage/main_blogs_uploads/' . $value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function Headings(): HasMany
    {
        return $this->hasMany(Heading::class);
    }
}
