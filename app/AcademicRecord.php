<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AcademicRecord, this is our model for our academicRecord table.
 *
 * @package App
 */
class AcademicRecord extends Model
{
    protected $table = 'academicRecords';
    protected $primaryKey = ['rollNo', 'courseCode'];
    public $incrementing = false;

    /**
     * Get the student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo('App\Student', 'rollNo', 'rollNo');
    }

    /**
     * Get the teaching detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teachingDetail()
    {
        return $this->belongsTo('App\TeachingDetail', 'courseCode', 'courseCode');
    }
}
