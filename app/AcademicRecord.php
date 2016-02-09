<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicRecord extends Model
{
    protected $primaryKey = ['rollNo', 'courseCode'];
}
