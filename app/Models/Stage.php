<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function starts()
    {
        return $this->hasMany(Start::class);
    }
}
