<?php

namespace Ikazuchi;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
