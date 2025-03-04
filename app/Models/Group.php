<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'user_id',
        'desc',
        'code',
    ];

    public $appends = ['image_url'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_group', 'group_id', 'user_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function ujians()
    {
        return $this->hasMany(Ujian::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->logo ? Storage::url($this->logo) : url('nothumbnail.png');
    }

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }

    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
