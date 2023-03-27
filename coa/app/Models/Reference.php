<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'refer1_name',
        'refer2_name',
        'refer1_job',
        'refer2_job',
        'other_note1',
        'other_note2',
        'refer1_address',
        'refer2_address',
        'refer1_company',
        'refer2_company',
        'refer1_tel',
        'refer2_tel',
        'refer1_email',
        'refer2_email',
    ];

}
