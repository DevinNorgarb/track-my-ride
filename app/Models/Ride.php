<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_time', 'end_time'
    ];

    /**
     * Get the user that owns the ride.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function coordinates()
    {
        return $this->hasMany(Coordinate::class);
    }
}
