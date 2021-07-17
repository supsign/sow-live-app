<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['shortname'];

    public function runners()
    {
        return $this->hasMany(Runner::class);
    }

    public function starts()
    {
        return $this->hasMany(Start::class);
    }
}
