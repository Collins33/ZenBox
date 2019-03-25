<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{   
    // fillable describes the properities that will be mass assigned
    public $fillable = ['product_id','body'];
    /**
     * Describes the relationship
     * with a product
    */
    public function product()
    {
        $this->belongsTo(Product::class);
    }
    
    /**
     * Will modify the sql query
     * to fetch description which match
     * the product ID
    */
    public function scopeOfProduct($query, $productId)
    {   // scopes are usefull to modify queries
        return $query->where('product_id', $productId);
    }
}
