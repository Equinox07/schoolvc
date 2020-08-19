<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $table = 'students_details';
    protected $fillable = ['student_id', 'school_id', 'location', 'name_of_guardian', 'course', 'image', 'grades'];
}
