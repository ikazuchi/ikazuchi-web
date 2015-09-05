<?php

namespace Ikazuchi;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function devices() {
        return $this->hasMany(Device::class);
    }
}
