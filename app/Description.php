<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{   
    /**
     * Describes the relationship
     * with a product
    */
    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
