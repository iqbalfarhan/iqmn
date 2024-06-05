<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'github_id',
        'github_token',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->github_id) {
            return $this->photo ?? url('nouser.png');
        }
        else{
            return $this->photo ? Storage::url($this->photo) : url('nouser.png');
        }
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_has_group', 'user_id', 'group_id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'user_has_material', 'user_id', 'material_id')->where('show', true);
    }

    public function sosmeds()
    {
        return $this->hasMany(Sosmed::class);
    }
}
