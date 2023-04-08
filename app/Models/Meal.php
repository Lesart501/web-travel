<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public $timestamps = false;

    public function tour() {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
