<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sosmed extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'link',
    ];

    public function scopeGithub(){
        return $this->where('name', 'github')->first();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
