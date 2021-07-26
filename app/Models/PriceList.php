<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;

    const EUROPE_CURRENCY_CODE = 'EUR';

    const INTERNATIONAL_CURRENCY_CODE = 'USD';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function price(){
        return $this->belongsTo(Price::class);
    }

}
