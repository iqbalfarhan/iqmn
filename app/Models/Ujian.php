<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'group_id',
        'start',
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }

    public function getStatusLabelAttribute(){
        return $this->start ? [
            'label' => 'Ujian sedang berlangsung',
            'desc' => 'Peserta sudah bisa mulai mengerjakan ujian.'
            ] : [
            'label' => 'Ujian dihentikan',
            'desc' => 'Peserta sudah tidak bisa lagi mengubah jawaban.'
            ];
    }
}
