<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student, this is our model for students table.
 *
 * @package App
 */
class Student extends Model
{
    protected $primaryKey = "rollNo";
    public $incrementing = false;

    /**
     * Get the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
