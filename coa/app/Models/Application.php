<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date_of_birth',
        'marital_status',
        'nationality',
        'have_ni',
        'ni_number',
        'ni_reference_number',
        'have_mnc',
        'mnc_pin',
        'relative_name',
        'relationship',
        'address1',
        'address2',
        'address3',
        'postTown',
        'postcode',
        'relative_tel_code',
        'relative_tel',
        'relative_mobile_code',
        'relative_mobile',
        'relative_email',
        'visa_status',
        'other_note',
        'visa_expiry_date',
        'passport_no',
        'place_of_issue',
        'issue_date',
        'expiry_date',
        'have_sharecode',
        'sharecode',
        'choose',
        'gender',
        'age',
        'disable',
        'disability_note',
        'service',
        'service_note',
        'offence',
        'offence_note',
        'disciplinary_procedure',
        'disciplinary_note',
        'criminal_offence',
        'criminal_note',
        'agree_declaration',
        'agree',
        'notes',
        'signature',
        'name',
        'date',
    ];
}
