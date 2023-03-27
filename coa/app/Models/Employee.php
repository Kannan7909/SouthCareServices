<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'employee';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'surname',
        'firstname',
        'posts',
        'kitchen_assistant',
        'domestic_Care',
        'care_assistant',
        'living_Care',
        'status',
        'address1',
        'address2',
        'address3',
        'postTown',
        'postcode',
        'contact_no',
		'country_code',
        'uk_contact_no',
        'email',
        'login_id',
        'password',
        'role',
        'registration_status',
        'application_status',
        'reference_status',
        'health_status',
        'dbs_status',
        'training_status',
        'bank_status',
        'starter_status',
        'starterChecklist',
        'induction_checklist',
        'employee_contract',
        'final_check',
        'policy_agree',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
