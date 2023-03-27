<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'view_user',
        'edit_user',
        'delete_user',
        'upload_user',
        'download_user',
        'view_application',
        'edit_application',
        'delete_application',
        'upload_application',
        'download_application',
        'view_training',
        'edit_training',
        'delete_training',
        'upload_training',
        'download_training',
		'view_reference',
        'edit_reference',
        'delete_reference',
        'upload_reference',
        'download_reference',
        'view_health',
        'edit_health',
        'delete_health',
        'upload_health',
        'download_health',
        'view_dbs',
        'edit_dbs',
        'delete_dbs',
        'upload_dbs',
        'download_dbs',
		'view_bank',
        'edit_bank',
        'delete_bank',
        'upload_bank',
        'download_bank',
        'view_starter',
        'edit_starter',
        'delete_starter',
        'upload_starter',
        'download_starter',
		'view_contract',
        'edit_contract',
        'delete_contract',
        'upload_contract',
        'download_contract',
        'view_induction',
        'edit_induction',
        'delete_induction',
        'upload_induction',
        'download_induction',
        'terms_condition',
        'email_template',
        'contract_content',
        'pay_rates',
        'department_role',
        'add_staff',
        'view_edit',
        'delete_deactivate'
    ];
}
