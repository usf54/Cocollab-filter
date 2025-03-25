<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;


    protected $fillable = ['user_id', 'logo_image', 'brandName', 'brandSize', 'brandDescription', 'brandLocalisation', 'pack_id', 'collaboration_id', 'sector_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pack()
    {
        return $this->belongsTo(Pack::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function collaboration()
    {
        return $this->belongsTo(Collaboration::class);
    }

    public function contacts()
    {
        return $this->hasMany(ContactInfluencer::class);
    }
}
