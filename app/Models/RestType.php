<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestType extends Model
{
    public $timestamps = false;

    public function tour() {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
