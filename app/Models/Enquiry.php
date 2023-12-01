<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_no',
        'full_name',
        'course_title',
        'comment',
        'enquiry_at'

    ];
}
