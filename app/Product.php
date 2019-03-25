<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   

    public $fillable = ['name'];
    /**
     * Describes the relationship with descriptions
     *
     */
    public function descriptions(){
        // takes the full path for description class
        return $this->hasMany(Description::class);

    }
}
