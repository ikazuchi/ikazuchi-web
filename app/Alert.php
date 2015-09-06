<?php

namespace Ikazuchi;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function scopeActive($query) {
        return $query->where('is_active', true);
    }
}
