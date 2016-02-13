<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Day, this is our model for day table
 *
 * @package App
 */
class Day extends Model
{
    protected $primaryKey = 'day';
    public $incrementing = false;

    /**
     * Get the time table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timeTables()
    {
        return $this->hasMany('App\TimeTable', 'day', 'day');
    }
}
