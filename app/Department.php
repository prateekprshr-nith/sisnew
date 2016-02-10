<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'dCode';
    protected $incrementing = false;

    public function teachers()
    {
        return $this->belongsTo('App\Department', 'dCode', 'dCode');
    }
}
