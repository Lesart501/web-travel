<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
    public function tour() {
        return $this->belongsTo(Tour::class, 'tours_id', 'id');
    }

    protected $fillable = ['status', 'users_id', 'tours_id', 'out_date', 'return_date'];
}
