<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TimeTable, this is our model for timeTable table.
 *
 * @package App
 */
class TimeTable extends Model
{
    protected $table = 'timeTables';
    protected $primaryKey = ['sectionId', 'semNo', 'day'];
    public $incrementing = false;

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
     * Get the teaching detail.
     *
     * NOTE: This relation may be problematic, and it may have to be worked out
     * again
     *
     */
    public function teachingDetail()
    {
        //return $this->belongsTo('App\TeachingDetail', 'courseCode', '')
    }
}