<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{

    protected $with=['club'];
    
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
