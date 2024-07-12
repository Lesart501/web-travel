<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tour
 * @property-read int|null $tour_count
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    public $timestamps = false;

    public function tour() {
        return $this->hasMany(Tour::class, 'tours_id', 'id');
    }
}
