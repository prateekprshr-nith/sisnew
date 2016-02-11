<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Course, this model for our courses table
 *
 * @package App
 */
class Course extends Model
{
    protected $primaryKey = 'courseCode';
    public $incrementing = false;

    /**
     * Get the department of the course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
