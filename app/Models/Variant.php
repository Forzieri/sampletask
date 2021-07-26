<?php

namespace App\Models;
;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variant extends Model
{
    use HasFactory;

    const AVAILABLE_STATUS = 'available';

    const SOLD_OUT_STATUS = 'sold out';

    public $timestamps = false;

    public $with = ['product'];

    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
