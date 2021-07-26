<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $with = ['priceList'];

    public $timestamps = false;

    protected $guarded = ['id'];

    public function priceList(){
        return $this->hasOne(PriceList::class);
    }

}
