<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
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
}
