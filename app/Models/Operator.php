<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tour> $tour
 * @property-read int|null $tour_count
 * @method static \Illuminate\Database\Eloquent\Builder|Operator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Operator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Operator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operator whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Operator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Operator extends Model
{
    public function tour() {
        return $this->hasMany(Tour::class, 'tours_id', 'id');
    }
}
