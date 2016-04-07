<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assignment, this model corresponds
 * to the assignments database table
 *
 * @package App
 */
class Assignment extends Model
{
    protected $table = 'assignments';
    protected $primaryKey = ['courseCode', 'number'];
    public $incrementing = false;

    // Fillable and hidden arrtibutes
    protected $fillable = [
        'courseCode', 'number', 'title', 'description', 'dueDate'
    ];


    /**
     * Model relationships
     *
     * These functions define the relationship of
     * this model with other models, and takes
     * care of how related data is retrived
     */
    
    /**
     * Get the teaching detail of assignment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teachingDetail ()
    {
        return $this->belongsTo('App\TeachingDetail', 'courseCode', 'courseCode');
    }
}
