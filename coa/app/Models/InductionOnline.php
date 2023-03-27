<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InductionOnline extends Model
{
    use HasFactory;
    protected $fillable = [
        'induction_date',
        'induction_time',
        'limit',
    ];
}
