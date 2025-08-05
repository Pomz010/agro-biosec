<?php

namespace App\Http\Controllers;

use App\Models\Employee_Response;
use Illuminate\Http\Request;
use App\Models\Respondent;
use PhpParser\Node\Stmt\Return_;

class FormController extends Controller
{
    public function showEmployeeForm(){
        $respondents = Respondent::orderBy('lastname')->get();
        return view('employee-form', ['respondents' => $respondents]);
    }

    public function submitEmployeeResponse(Request $request){
        
        $response = $request->validate([
            'respondents_id' => ['required'],
            'business_unit' => ['required'],
            'questionnaire_1' => ['required'],
            'employeeVisitedOtherFarm' => ['required'],
            'visitedOtherFarm_remarks' => ['nullable', 'min:5', 'max:100'],
            'questionnaire_2' => ['required'],
            'travelledOutsideCity_remarks' => ['nullable', 'min:3', 'max:30'],
            'questionnaire_3' => ['required'],
            'questionnaire_4' => ['required'],
            'questionnaire_5' => ['required'],
            'questionnaire_6' => ['required'],
            'questionnaire_7' => ['required'],
            'questionnaire_8' => ['required'],
            'questionnaire_9' => ['required'],
            'questionnaire_10' => ['required'],
            'questionnaire_11' => ['required'],
            'questionnaire_12' => ['required'],
            'visitedOtherFarm' => ['required'],
            'travelledOutsideCity' => ['required'],
            'soreThroat' => ['required'],
            'bodyPain' => ['required'],
            'fever' => ['required'],
            'headache' => ['required'],
            'nasalDischarge' => ['required'],
            'cough' => ['required'],
            'wearCleanClothes' => ['accepted'],
            'prohibitPoultryProducts' => ['accepted'],
            'decontamination' => ['accepted'],
            'followBiosecProtocols' => ['accepted']
        ]);


        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_1,
            'answer' => $request->visitedOtherFarm,
            'remarks' =>$request->visitedOtherFarm_remarks
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_2,
            'answer' => $request->travelledOutsideCity,
            'remarks' => $request->travelledOutsideCity_remarks
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_3,
            'answer' => $request->soreThroat
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_4,
            'answer' => $request->input('bodyPain')
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_5,
            'answer' => $request->fever
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_6,
            'answer' => $request->headache
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_7,
            'answer' => $request->nasalDischarge
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_8,
            'answer' => $request->cough
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_9,
            'answer' => $request->wearCleanClothes
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_10,
            'answer' => $request->prohibitPoultryProducts
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_11,
            'answer' => $request->decontamination
        ]);

        Employee_Response::create([
            'respondents_id' => $request->respondents_id,
            'business_unit' => $request->business_unit,
            'employee_questionnaires_id' => $request->questionnaire_12,
            'answer' => $request->followBiosecProtocols
        ]);

        return view('index');
    }
}
