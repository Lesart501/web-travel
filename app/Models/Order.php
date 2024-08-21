<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $statuses_id
 * @property int $users_id
 * @property int $tours_id
 * @property string $out_date
 * @property string $return_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Status $status
 * @property-read \App\Models\Tour $tour
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOutDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereToursId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUsersId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    public function status() {
        return $this->belongsTo(Status::class, 'statuses_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function tour() {
        return $this->belongsTo(Tour::class, 'tours_id', 'id');
    }

    protected $fillable = ['statuses_id', 'users_id', 'tours_id', 'out_date', 'return_date'];
}
