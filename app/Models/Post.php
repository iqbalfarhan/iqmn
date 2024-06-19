<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'tags',
        'photo',
        'show',
    ];

    protected $casts = [
        'tags' => 'array',
        'show' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : url('nocontent.png');
    }

    public function scopeJsonContainsIn($query, $column, array $values)
    {
        $query->where(function ($query) use ($column, $values) {
            foreach ($values as $value) {
                $query->orWhereRaw("JSON_CONTAINS($column, '\"$value\"')");
            }
        });

        return $query;
    }
}
