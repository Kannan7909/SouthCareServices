<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InductionUserOnline extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'induction_id',
        'status',
    ];
}
