<?php

namespace App\Http\Controllers;

use App\Models\EmployeeResponse;
use App\Models\User;
use App\Models\Respondent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function responseLogsIndex(){
        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
        ->select(
            'users.id',
            'respondents.firstname', 
        )
        ->get();

        // eager load respondents and questionnaires
        $responses = EmployeeResponse::with(['respondent', 'questionnaire'])->get();

        // dd($emp_response);
        foreach($users as $user){
            if($user->id === Auth::user()->id){
                return view('response-logs', ['user' => $user, 'responses' => $responses]);
            }
        };
    }

    public function create(Request $request){
        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
        ->select(
            'users.id',
            'respondents.firstname', 
        )
        ->get();

        foreach($users as $currentUser){
            if($currentUser->id === Auth::user()->id){
                return view('employee-create', ['currentUser' => $currentUser]);
            }
        }
    }

    public function  update(Request $request, Respondent $respondent){
        $employee = $request->validate([
            'employee_id' => ['required', 'min:10', 'max:10'],
            'lastname'=> ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'firstname' => ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'middle_name' => ['required', 'string', 'regex:/^[\pL\s\'\-,.]+$/u',],
            'email' => ['nullable', 'email'],
            'business_unit_address' => ['required', 'string', 'min:5', 'max:100'],
            'is_resigned' => ['nullable', 'boolean']
        ]);

        
        $employee['employee_id'] = mb_strtolower(strip_tags($employee['employee_id']));
        $employee['lastname'] = mb_strtolower(strip_tags($employee['lastname']));
        $employee['firstname'] = mb_strtolower(strip_tags($employee['firstname']));
        $employee['middle_name'] = mb_strtolower(strip_tags($employee['middle_name']));
        $employee['email'] = mb_strtolower(strip_tags($employee['email']));
        $employee['business_unit_address'] = mb_strtolower(strip_tags($employee['business_unit_address']));
        $employee['is_resigned'] = mb_strtolower(strip_tags($employee['is_resigned']));

        $respondent->update($employee);

        return redirect(route('employee.index'))->with('navActive', 'employee-management');
    }

    public function showFilter(){
        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
        ->select(
            'users.id',
            'respondents.firstname', 
        )
        ->get();

        foreach($users as $user){
            if($user->id === Auth::user()->id){
                return view('response_filter', ['user' => $user]);
            }
        }
    }

    public function show(Respondent $respondent){
        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
            ->select(
                'users.id',
                'respondents.firstname', 
            )
            ->get();

        foreach($users as $currentUser){
            if($currentUser->id === Auth::user()->id){
                return view('update-employee', ['employee' => $respondent, 'currentUser' => $currentUser]);
            }
        }
    }

    public function index(){

            $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
            ->select(
                'users.id',
                'respondents.firstname', 
            )
            ->get();

            $query = Respondent::orderBy('lastname'); // Start with the base query

            if (request()->has('searchBox')) {
                $searchTerm = request()->get('searchBox', '');

                // Apply the search to multiple columns
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('lastname', 'like', '%' . $searchTerm . '%')
                    ->orWhere('firstname', 'like', '%' . $searchTerm . '%')
                    ->orWhere('middle_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('employee_id', 'like', '%' . $searchTerm . '%');
                });
            }

            $employees = $query->paginate(15); // Apply pagination after potential filtering

            foreach($users as $currentUser){
                if($currentUser->id === Auth::user()->id){
                    return view('employee_list', ['employees' => $employees, 'currentUser' => $currentUser]);
                }
            }
    }

    public function login(){
        return view('login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
       // Validate the incoming request
        $validated = $request->validate([
            'email' => ['required', 'email'], // must be a valid email address
            'password' => ['required', 'string', 'min:8'], // minimum of 8 characters
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::whereHas('respondent', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->with('respondent')->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // login successful
            Auth::login($user); // or Auth::guard()->login($user);

            return redirect()->intended(route('employee.index'));
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
}
