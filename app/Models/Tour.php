<?php

namespace App\Models;

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

    public function accomodation() {
        return $this->belongsTo(Accomodation::class, 'accomodations_id', 'id');
    }

    public function meal() {
        return $this->belongsTo(Meal::class, 'meals_id', 'id');
    }

    public function restType() {
        return $this->belongsTo(RestType::class, 'restTypes_id', 'id');
    }

    protected $fillable = [
        'name', 'place', 'countries_id', 'people', 'nights', 'image', 'operators_id', 'accomodations_id', 'meals_id', 'restTypes_id',
        'description', 'price'
    ];
}
