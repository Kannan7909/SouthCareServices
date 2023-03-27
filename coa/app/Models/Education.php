<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'study_place',
        'qualification',
        'qualified_date',
    ];
}
