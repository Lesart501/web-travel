<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    public function tour() {
        return $this->hasMany(Tour::class, 'tours_id', 'id');
    }
}