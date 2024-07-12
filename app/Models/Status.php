<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $order
 * @property-read int|null $order_count
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @mixin \Eloquent
 */
class Status extends Model
{
    public $timestamps = false;

    public function order() {
        return $this->hasMany(Order::class, 'id', 'id');
    }
}
