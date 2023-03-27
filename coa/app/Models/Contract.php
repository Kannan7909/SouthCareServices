<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'commencement_date',
        'weekday_longday_type1',
        'weekday_night_type1',
        'bank_holiday_type1',
        'weekend_longday_type1',
        'weekend_night_type1',
        'weekday_longday_type2',
        'weekend_longday_type2',
        'bank_holiday_type2',
        'kitchen_weekday_longday',
        'kitchen_weekday_night',
        'kitchen_bank_holiday',
        'kitchen_weekend_longday',
        'kitchen_weekend_night',
        'domestic_weekday_longday',
        'domestic_weekday_night',
        'domestic_bank_holiday',
        'domestic_weekend_longday',
        'domestic_weekend_night',
        'care_weekday_longday',
        'care_weekday_night',
        'care_bank_holiday',
        'care_weekend_longday',
        'care_weekend_night',
        'living_weekday_longday',
        'living_weekday_night',
        'living_bank_holiday',
        'living_weekend_longday',
        'living_weekend_night',
    ];
}
