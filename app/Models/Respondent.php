<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Employee_response;

class Respondent extends Model
{
    protected $fillable = ['employee_id', 'lastname', 'firstname', 'middle_name', 'email', 'business_unit_address', 'is_resigned'];

    protected $casts = [
        'emp_status' => 'boolean',
    ];

    protected $table = 'respondents';

    public function response(): HasMany {
        return $this->hasMany(Employee_response::class, 'respondents_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'respondents_id');
    }
}
