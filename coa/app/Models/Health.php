<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'gp_name',
        'gp_country_code',
        'gp_mobile',
        'address1',
        'address2',
        'address3',
        'postTown',
        'postcode',
        'depression',
        'depression_note',
        'epilepsy',
        'epilepsy_note',
        'ailment',
        'ailment_note',
        'spinal',
        'spinal_note',
        'arthritis',
        'arthritis_note',
        'heart',
        'heart_note',
        'kidney',
        'kidney_note',
        'diabetes',
        'diabetes_note',
        'skin',
        'skin_note',
        'medication',
        'alcohol',
        'tobacco',
        'disabled',
        'disabled_note',
        'benefit',
        'absent',
        'pregnant',
        'pregnant_note',
        'additional'
    ];
}
