<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Accomodation extends Model
{
    public $timestamps = false;

    public function tour(): Relation
    {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
