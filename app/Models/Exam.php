<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ujian_id',
        'data',
        'selesai',
    ];

    protected $casts = [
        'data' => 'array',
        'selesai' => 'boolean',
    ];

    public static $initialData = [
        'jawaban' => [],
        'nilai' => 0,
        'benar' => 0,
        'salah' => 0,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ujian(){
        return $this->belongsTo(Ujian::class);
    }
}
