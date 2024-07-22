<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'ujian_id',
        'media',
        'question',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function getOptionListsAttribute(){
        return [
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            'd' => $this->d,
        ];
    }

     public function getMediaUrlAttribute()
    {
        return $this->media ? Storage::url($this->media) : url('nocontent.png');
    }
}
