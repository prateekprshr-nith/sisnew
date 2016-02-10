<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachingDetail extends Model
{
    protected $table = 'teachingDetails';
    protected $primaryKey = 'courseCode';
    protected $incrementing = false;
}
