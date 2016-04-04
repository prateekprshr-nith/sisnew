<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TeachingDetail, this is our model for teachingDetails table
 *
 * @package App
 */
class TeachingDetail extends Model
{
    protected $table = 'teachingDetails';
    protected $primaryKey = 'courseCode';
    public $incrementing = false;

    /**
     * Get the teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'facultyId', 'facultyId');
    }

    /**
     * Get the course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('App\Course', 'courseCode', 'courseCode');
    }

    /**
     * Get the academic records
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academicRecords()
    {
        return $this->hasMany('App\AcademicRecord', 'courseCode', 'courseCode');
    }

    /**
     * Get the time table of this course. It returns an array containing the tuples
     * in which the classes of this course take place.
     * Use getResult() funtion on the array contents to get the record, in your
     * controller
     *
     * NOTE: This relation may be problematic, and it may have to be worked out
     * again
     *
     * @return array
     */
    public function timeTables()
    {
        $classArr = [];     // This array contains the tuples of the timeTable at which classes take place
        $classes = 8;       // 8 classes in a day


        // Now get all tuples in which the classes of this course code are present
        for($i = 1; $i <= $classes; $i++)  // timeTable cols start from class1, class2, ..., class
        {
            $class = 'class' . strval($i);
            $classArr[$i] = $this->hasMany('App\TimeTable', $class, 'courseCode');
        }

        return $classArr;
    }
}
