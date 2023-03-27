<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InductionChecklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'history',
        'philosophy',
        'personality',
        'organisation',
        'handbook',
        'contacts',
        'policy',
        'opportunity',
        'workplace',
        'statement',
        'salary',
        'sick',
        'duty',
        'uniform',
        'availability',
        'time',
        'transportation',
        'mobile',
        'protection',
        'complaints',
        'trainings',
        'hygiene',
        'agree',
        'signature',
        'name',
        'date'
    ];
}
