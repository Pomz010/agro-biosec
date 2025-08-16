<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    protected $table = 'questionnaires';

    public function responses(): HasMany {
        return $this->hasMany(Employee_response::class, 'questionnaire_id');
    }
}
