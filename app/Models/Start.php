<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Start extends Model
{
    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function runner()
    {
        return $this->belongsTo(Runner::class);
    }
}
