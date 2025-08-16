<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Employee_response;

class EmployeeResponseController extends Controller
{
    public function index()
    {
        // eager load respondents and questionnaires
        $responses = Employee_response::with(['respondent', 'questionnaire'])->get();

        return view('response-logs', ['responses' => $responses]);
    }
}
