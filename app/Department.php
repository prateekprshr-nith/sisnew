<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Department, this is the model for our
 * department table
 *
 * @package App
 */
class Department extends Model
{
    protected $primaryKey = 'dCode';
    public $incrementing = false;

    /**
     * Get the teachers of the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teachers()
    {
        return $this->hasMany('App\Teacher', 'dCode', 'dCode');
    }


    /**
     * Get the courses of the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Course', 'dCode', 'dCode');
    }

    /**
     * Get the sections of the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany('App\Section', 'dCode', 'dCode');
    }

    /**
     * Get the students of the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Student', 'dCode', 'dCode');
    }
}
