<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'fId';
    protected $incrementing = false;

    public function department()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
