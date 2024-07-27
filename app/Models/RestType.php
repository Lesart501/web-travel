<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tour
 * @property-read int|null $tour_count
 * @method static \Illuminate\Database\Eloquent\Builder|RestType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestType whereName($value)
 * @mixin \Eloquent
 */
class RestType extends Model
{
    public $timestamps = false;

    public function tour() {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
