<?php

namespace App\Http\Controllers;

use App\Models\Employee_Response;
use Illuminate\Http\Request;
use App\Models\Respondent;
use Mockery\Matcher\Not;
use Mockery\Undefined;
use PhpParser\Node\Stmt\Return_;

class EmployeeFormController extends Controller
{
    public function createResponse(){
        $respondents = Respondent::orderBy('lastname')->get(); //Fetch all employee list and sort by alphabetical order and display in the dropdown field of employee selection.
        return view('employee-form', ['respondents' => $respondents]);
    }

    public function submitEmployeeResponse(Request $request){
        // dd($request);
        $response = $request->validate([
            'respondents_id' => ['required'],
            'business_unit' => ['required'],
            'questionnaire_1' => ['required'],
            'employeeVisitedOtherFarm' => ['required'],
            'employeeVisitedOtherFarm_remarks' => ['nullable', 'min:5', 'max:100'],
            'questionnaire_2' => ['required'],
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
            'travelledOutsideCity' => ['required'],
            'travelledOutsideCity_remarks' => ['nullable', 'min:3', 'max:30'],
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

        $response = array_map('mb_strtolower', $response);

        if($request->has('employeeVisitedOtherFarm_remarks')){
            Employee_Response::create([
                'respondents_id' => $response['respondents_id'],
                'business_unit' => $response['business_unit'],
                'questionnaire_id' => $response['questionnaire_1'],
                'answer' => $response['employeeVisitedOtherFarm'],
                'remarks' =>$response['employeeVisitedOtherFarm_remarks']
            ]);
        } else {
            Employee_Response::create([
                'respondents_id' => $response['respondents_id'],
                'business_unit' => $response['business_unit'],
                'questionnaire_id' => $response['questionnaire_1'],
                'answer' => $response['employeeVisitedOtherFarm']
            ]);
        }

        if($request->has('travelledOutsideCity_remarks')){
            Employee_Response::create([
                'respondents_id' => $response['respondents_id'],
                'business_unit' => $response['business_unit'],
                'questionnaire_id' => $response['questionnaire_2'],
                'answer' => $response['travelledOutsideCity'],
                'remarks' => $response['travelledOutsideCity_remarks']
            ]);
        }else{
            Employee_Response::create([
                'respondents_id' => $response['respondents_id'],
                'business_unit' => $response['business_unit'],
                'questionnaire_id' => $response['questionnaire_2'],
                'answer' => $response['travelledOutsideCity']
            ]);
        }

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_3'],
            'answer' => $response['soreThroat']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_4'],
            'answer' => $response['bodyPain']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_5'],
            'answer' => $response['fever']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_6'],
            'answer' => $response['headache']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_7'],
            'answer' => $response['nasalDischarge']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_8'],
            'answer' => $response['cough']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_9'],
            'answer' => $response['wearCleanClothes']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_10'],
            'answer' => $response['prohibitPoultryProducts']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_11'],
            'answer' => $response['decontamination']
        ]);

        Employee_Response::create([
            'respondents_id' => $response['respondents_id'],
            'business_unit' => $response['business_unit'],
            'questionnaire_id' => $response['questionnaire_12'],
            'answer' => $response['followBiosecProtocols']
        ]);

        return view('index');
    }
}
