<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContract extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'name',
        'signature',
        'date',
        'action'
    ];
}
