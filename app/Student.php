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

    /**
     * Get the semester
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semester()
    {
        return $this->belongsTo('App\Semester', 'semNo', 'semNo');
    }

    /**
     * Get the section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo('App\Section', 'sectionId', 'sectionId');
    }

    /**
     * Get the academic records
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academicRecords()
    {
        return $this->hasMany('App\AcademicRecord', 'rollNo', 'rollNo');
    }
}
