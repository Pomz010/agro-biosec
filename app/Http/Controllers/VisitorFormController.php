<?php

namespace App\Http\Controllers;

use App\Models\VisitorResponse;
use Illuminate\Http\Request;

class VisitorFormController extends Controller
{
    public function createResponse(){
        return view('visitor-form');
    }

    public function submitVisitorResponse(Request $request){

        $response = $request->validate([
            'business_unit' => ['required'],
            'lastname' => ['required'],
            'firstname' => ['required'],
            'middle_name' => ['required'],
            'baranggay' => ['required'],
            'municipality' => ['required'],
            'province' => ['required'],
            'comp_name' => ['required'],
            'comp_street' => ['required'],
            'comp_brgy' => ['required'],
            'comp_municipality' => ['required'],
            'comp_province' => ['required'],
            'nature_of_visit' => ['required'],
            'plate_number' => ['nullable'],
            'questionnaire_1' => ['required'],
            'visitorVisitedOtherFarm' => ['required'],
            'visitorVisitedOtherFarm_remarks' => ['nullable'],
            'questionnaire_3' => ['required'],
            'soreThroat' => ['required'],
            'questionnaire_4' => ['required'],
            'bodyPain' => ['required'],
            'questionnaire_5' => ['required'],
            'fever' => ['required'],
            'questionnaire_6' => ['required'],
            'headache' => ['required'],
            'questionnaire_7' => ['required'],
            'nasalDischarge' => ['required'],
            'questionnaire_8' => ['required'],
            'cough' => ['required'],
            'questionnaire_13' => ['required'],
            'allergies' => ['required'],
            'questionnaire_14' => ['required'],
            'asthma' => ['required']
        ]);

        $response = array_map('mb_strtolower', $response);

        if($request->has('visitorVisitedOtherFarm_remarks')){
            VisitorResponse::create([
                'business_unit' => $response['business_unit'],
                'lastname' => $response['lastname'],
                'firstname' => $response['firstname'],
                'middle_name' => $response['middle_name'],
                'baranggay' => $response['baranggay'],
                'municipality_city' => $response['municipality'],
                'province_region' => $response['province'],
                'company_name' => $response['comp_name'],
                'company_street' => $response['comp_street'],
                'company_baranggay' => $response['comp_brgy'],
                'company_municipality' => $response['comp_municipality'],
                'company_province' => $response['comp_province'],
                'nature_of_visit' => $response['nature_of_visit'],
                'plate_number' => $response['plate_number'],
                'questionnaire_id' => $response['questionnaire_1'],
                'answer' => $response['visitorVisitedOtherFarm'],
                'remarks' =>  $response['visitorVisitedOtherFarm_remarks']
            ]);
        }else{
            VisitorResponse::create([
                'business_unit' => $response['business_unit'],
                'lastname' => $response['lastname'],
                'firstname' => $response['firstname'],
                'middle_name' => $response['middle_name'],
                'baranggay' => $response['baranggay'],
                'municipality_city' => $response['municipality'],
                'province_region' => $response['province'],
                'company_name' => $response['comp_name'],
                'company_street' => $response['comp_street'],
                'company_baranggay' => $response['comp_brgy'],
                'company_municipality' => $response['comp_municipality'],
                'company_province' => $response['comp_province'],
                'nature_of_visit' => $response['nature_of_visit'],
                'plate_number' => $response['plate_number'],
                'questionnaire_id' => $response['questionnaire_1'],
                'answer' => $response['visitorVisitedOtherFarm']
            ]);
        }


        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_3'],
            'answer' => $response['soreThroat'],
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_4'],
            'answer' => $response['bodyPain'],
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_4'],
            'answer' => $response['bodyPain']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_5'],
            'answer' => $response['fever']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_6'],
            'answer' => $response['headache']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_7'],
            'answer' => $response['nasalDischarge']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_8'],
            'answer' => $response['cough']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_13'],
            'answer' => $response['allergies']
        ]);

        VisitorResponse::create([
            'business_unit' => $response['business_unit'],
            'lastname' => $response['lastname'],
            'firstname' => $response['firstname'],
            'middle_name' => $response['middle_name'],
            'baranggay' => $response['baranggay'],
            'municipality_city' => $response['municipality'],
            'province_region' => $response['province'],
            'company_name' => $response['comp_name'],
            'company_street' => $response['comp_street'],
            'company_baranggay' => $response['comp_brgy'],
            'company_municipality' => $response['comp_municipality'],
            'company_province' => $response['comp_province'],
            'nature_of_visit' => $response['nature_of_visit'],
            'plate_number' => $response['plate_number'],
            'questionnaire_id' => $response['questionnaire_14'],
            'answer' => $response['asthma']
        ]);

        return view('index');
    }
}
