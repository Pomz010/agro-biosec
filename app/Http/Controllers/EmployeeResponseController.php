<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\EmployeeResponse;

class EmployeeResponseController extends Controller
{
    public function index()
    {
        // eager load respondents and questionnaires
        $responses = EmployeeResponse::with(['respondent', 'questionnaire'])->get();

        return view('response-logs', ['responses' => $responses]);
    }
}
