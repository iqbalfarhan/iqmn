<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'thumbnail',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function getImageUrlAttribute()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : url('noimage.jpg');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
