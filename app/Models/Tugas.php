<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
