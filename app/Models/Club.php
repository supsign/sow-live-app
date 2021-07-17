<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = ['name'];

    public function runners()
    {
        return $this->hasMany(Runner::class);
    }
}
