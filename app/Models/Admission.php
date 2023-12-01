<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $fillable = [
        'enquiry_id',
        'status',
        'remarks',
        'amount',
        'addmission_at'



    ];
}
