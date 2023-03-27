<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'bank_name',
        'bank_address',
        'sort_code',
        'account_no',
        'account_holder',
        'address1',
        'address2',
        'address3',
        'postTown',
        'postcode'
    ];
}
