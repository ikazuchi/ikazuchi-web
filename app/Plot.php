<?php

namespace Ikazuchi;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $dates = ['device_timestamp'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
