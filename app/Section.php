<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Section, this is our model for sections table
 *
 * @package App
 */
class Section extends Model
{
    protected $primaryKey = 'sectionId';
    public $incrementing = false;

    // Fillable and hidden arrtibutes
    protected $fillable = [
        'sectionId',
    ];

    /**
     * Get the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }

    /**
     * Get the students
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function students()
    {
        return $this->hasMany('App\Student', 'sectionId', 'sectionId');
    }

    /**
     * Get the time tables
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeTables()
    {
        return $this->hasMany('App\TimeTable', 'sectionId', 'sectionId');
    }

}
