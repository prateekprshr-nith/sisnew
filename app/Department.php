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
}
