<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $appends = ['start_full'];

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

    public function getStartFullAttribute()
    {
        if (!$this->start) {
            return null;
        }
        $splittedStart = explode(':', $this->start);
        $paddedValues = [];
        foreach ($splittedStart as $value) {
            $paddedValues[] = str_pad($value, 2, '0', STR_PAD_LEFT);
        }

        return implode(':', $paddedValues);
    }
}
