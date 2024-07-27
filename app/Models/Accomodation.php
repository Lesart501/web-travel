<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tour
 * @property-read int|null $tour_count
 * @method static \Illuminate\Database\Eloquent\Builder|Accomodation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Accomodation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Accomodation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Accomodation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Accomodation whereName($value)
 * @mixin \Eloquent
 */
class Accomodation extends Model
{
    public $timestamps = false;

    public function tour(): Relation
    {
        return $this->hasMany(Tour::class, 'id', 'id');
    }
}
