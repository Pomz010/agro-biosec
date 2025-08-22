<?php

namespace App\Models;

use App\Models\Respondent;
use App\Models\Questionnaire;
use Illuminate\Database\Eloquent\Model;

class EmployeeResponse extends Model
{
    protected $fillable =[
        'respondents_id', 
        'business_unit', 
        'questionnaire_id', 
        'answer', 
        'remarks',
        'created_at',
        'updated_at'
    ];

    protected $table = 'employee_responses';

    public function respondent()
    {
        return $this->belongsTo(Respondent::class, 'respondents_id');
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }
}
