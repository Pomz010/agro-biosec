<?php

namespace App\Models;

use App\Models\Respondent;
use Illuminate\Database\Eloquent\Model;

class Employee_response extends Model
{
    protected $fillable =[
        'respondents_id', 
        'business_unit', 
        'questionnaire_id', 
        'answer', 
        'remarks'
    ];

    public function respondent(){
        return $this->belongsTo(Respondent::class);
    }
}
