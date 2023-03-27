<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Worker extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = 'worker';

    protected $fillable = [
        'name',
        'department_id',
        'role_id',
        'address',
        'postcode',
        'country_code_contact',
        'contact_tel',
        'country_code_mobile',
        'mobile_no',
        'email',
        'login_id',
        'password',
        'staff_status'
    ];
}
