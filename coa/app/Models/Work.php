<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'from',
        'to',
        'employer_name',
        'business_type',
        'job_title',
    ];
}
