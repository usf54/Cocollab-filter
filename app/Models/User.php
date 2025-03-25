<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'phone', 'email', 'password', 'role', 'status'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    public function influencer()
    {
        return $this->hasOne(Influencer::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function contactBrands()
    {
        return $this->hasMany(ContactBrand::class);
    }

    public function contactInfluencers()
    {
        return $this->hasMany(ContactInfluencer::class);
    }
}
