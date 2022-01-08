<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use Uuids;

    public $timestamps = false;

    protected $fillable = [
        'type',
        'order_id',
        'extra_id',
    ];

    public function plate()
    {
        return $this->belongsTo(Plate::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
