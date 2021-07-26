<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    const SIMPLE_TYPE = 'simple';

    const SIZE_TYPE = 'size';

    const COLOR_TYPE = 'color';

    use HasFactory;

    protected $guarded = ['id'];

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

}
