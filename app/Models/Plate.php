<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use Uuids;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image_url',
        'calories',
        'fats',
        'calories',
        'carbohydrates',
        'proteines',
        'benefits',
        'is_favorite',
        'is_recommended',
    ];

    protected $casts = [
        'is_favorite' => 'boolean',
        'is_recommended' => 'boolean',
    ];

    public function extras()
    {
        return $this->belongsToMany(Plate::class, 'extra_plate', 'plate_id', 'extra_id');
    }

    public function detail()
    {
        return $this->hasOne(DetailOrder::class);
    }
}
