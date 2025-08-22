<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorResponse extends Model
{
    protected $fillable = [
        'business_unit',
        'lastname',
        'firstname',
        'middle_name',
        'baranggay',
        'municipality_city',
        'province_region',
        'company_name',
        'company_street',
        'company_baranggay',
        'company_municipality',
        'company_province',
        'nature_of_visit',
        'plate_number',
        'questionnaire_id',
        'answer',
        'remarks'
    ];
}
