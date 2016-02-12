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

    /**
     * Get the department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
