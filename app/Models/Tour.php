<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function operator() {
        return $this->belongsTo(Operator::class, 'operators_id', 'id');
    }
    
    public function country() {
        return $this->belongsTo(Country::class, 'countries_id', 'id');
    }
    
    public function order() {
        return $this->hasMany(Order::class, 'orders_id', 'id');
    }

    protected $fillable = ['name', 'country', 'people', 'nights', 'image', 'operators_id', 'price'];
}
