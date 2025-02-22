<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
    ];

    protected $hidden = [
        'password',
        'github_id',
        'github_token',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->photo) {
            if (Str::startsWith($this->photo, 'http')) {
                return $this->photo;
            }
            else{
                return Storage::url($this->photo);
            }
        }
        else{
            return "https://api.dicebear.com/9.x/dylan/png?seed={$this->id}";
        }
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function owngroups()
    {
        return $this->hasMany(Group::class, 'user_id');
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

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
