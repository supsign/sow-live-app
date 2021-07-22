<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
