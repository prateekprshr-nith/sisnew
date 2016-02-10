<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher, this is the model for our teacher table
 *
 * @package App
 */
class Teacher extends Model
{
    protected $primaryKey = 'fId';
    public $incrementing = false;

    /**
     * Get the department of the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
