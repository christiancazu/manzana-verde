<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Additional extends Model
{
    use Uuids;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'include_sweet_potato',
        'include_potato',
        'include_rice',
        'include_spicy',
    ];

    protected $casts = [
        'include_sweet_potato' => 'boolean',
        'include_potato' => 'boolean',
        'include_rice' => 'boolean',
        'include_spicy' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
