<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respondent extends Model
{
    protected $fillable = ['employee_id', 'lastname', 'firstname', 'middle_name', 'email', 'business_unit_address', 'is_resigned'];

    protected $casts = [
        'emp_status' => 'boolean',
    ];

    public function response(): HasMany {
        return $this->hasMany(Employee_response::class);
    }

    public function user(){
        return $this->hasOne(User::class, 'respondents_id');
    }
}
