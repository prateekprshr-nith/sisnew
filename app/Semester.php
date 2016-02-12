<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester, this is our mode for semester table
 *
 * @package App
 */
class Semester extends Model
{
    protected $primaryKey = 'semNo';
    public $incrementing = false;

    /**
     * Get the time table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timeTables()
    {
        return $this->hasMany('App\TimeTable', 'semNo', 'semNo');
    }

    /**
     * Get the students
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Student', 'semNo', 'semNo');
    }
}
