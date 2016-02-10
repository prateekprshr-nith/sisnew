<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicRecord extends Model
{
    protected $table = 'academicRecords';
    protected $primaryKey = ['rollNo', 'courseCode'];
    protected $incrementing = false;
}
