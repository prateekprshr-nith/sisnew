<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $primaryKey = ['sectionId', 'semNo', 'day'];
}
