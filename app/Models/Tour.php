<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $place
 * @property int $countries_id
 * @property int $people
 * @property int $nights
 * @property string $image
 * @property int $operators_id
 * @property int $rest_types_id
 * @property int $accomodations_id
 * @property int $meals_id
 * @property string $description
 * @property int $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Accomodation $accomodation
 * @property-read \App\Models\Country $country
 * @property-read \App\Models\Meal $meal
 * @property-read \App\Models\Operator $operator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $order
 * @property-read int|null $order_count
 * @property-read \App\Models\RestType|null $restType
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereAccomodationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereCountriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereMealsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereNights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereOperatorsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour wherePeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereRestTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tour whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
