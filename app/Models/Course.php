<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CourseSubject;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'course_title',
        'course_code',
        'course_duration',
        '1st_sem_subjects',
        '2nd_sem_subjects',
        '3rd_sem_subjects'
        

     
    
    ] ;

    protected $dates = ['deleted_at'];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

  

   

}

