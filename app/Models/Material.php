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
        'show',
        'group_id'
    ];

    public $appends = ['image_url'];

    protected $casts = [
        'tags' => 'array',
    ];

    public function getImageUrlAttribute()
    {
        return $this->thumbnail ? Storage::url($this->thumbnail) : url('nocontent.png');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_material');
    }

    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
