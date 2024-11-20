<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'title',
        'body',
        'attachment',
        'duedate'
    ];

    protected $casts = [
        'duedate' => 'datetime'
    ];

    protected function group(){
        return $this->belongsTo(Group::class);
    }

    protected function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->photo ? Storage::url($this->attachment) : "https://dummyjson.com/icon/{$this->id}/100";
    }
}
