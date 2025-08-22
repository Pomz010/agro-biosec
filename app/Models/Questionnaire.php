<?php

namespace App\Models;

use App\Models\EmployeeResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    protected $table = 'questionnaires';

    public function responses(): HasMany {
        return $this->hasMany(EmployeeResponse::class, 'questionnaire_id');
    }
}
