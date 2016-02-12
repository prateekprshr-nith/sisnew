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
        return $this->belongsTo('App\Teacher', 'fId', 'fId');
    }
}
