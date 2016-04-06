<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentQuery, this is our model
 * for studentQueries db table
 *
 * @package App
 */
class StudentQuery extends Model
{
    protected $table = 'studentQueries';
    protected $primaryKey = ['rollNo', 'courseCode'];
    public $incrementing = false;

    // Fillable and hidden arrtibutes
    protected $fillable = [
        'rollNo', 'courseCode', 'description', 'response',
    ];


    /**
     * Model relationships
     *
     * These functions define the relationship of
     * this model with other models, and takes
     * care of how related data is retrived
     */

    /**
     * Get the academic record
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function academicRecord ()
    {
        return $this->belongsTo('App\AcademicRecord', 'rollNo', 'rollNo')
            ->where('courseCode', $this->courseCode);
    }
}
