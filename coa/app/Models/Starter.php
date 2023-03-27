<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starter extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'insurance',
        'start_date',
        'statementA',
        'statementB',
        'statementC',
        'loan',
        'is_complete',
        'is_debit',
        'loan_plan',
        'pg_loan',
        'is_pg_complete',
        'pg_debit',
        'signature',
        'full_name',
        'date'
    ];
}
