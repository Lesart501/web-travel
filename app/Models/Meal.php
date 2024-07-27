<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tour
 * @property-read int|null $tour_count
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Meal whereName($value)
 * @mixin \Eloquent
 */
class Meal extends Model
{
    public $timestamps = false;

    public function tour() {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
