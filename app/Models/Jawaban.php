<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas_id',
        'user_id',
        'answer',
        'attachment',
        'point',
    ];

    protected function tugas(){
        return $this->belongsTo(Tugas::class);
    }

    protected function user(){
        return $this->belongsTo(User::class);
    }
}
