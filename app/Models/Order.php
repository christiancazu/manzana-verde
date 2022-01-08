<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Uuids;

    protected $fillable = [
        'code_date',
    ];

    public function details()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function additionals()
    {
        return $this->hasMany(Additional::class);
    }
}
