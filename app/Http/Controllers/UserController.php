<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Respondent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('viewAdminUsers')){
            return redirect()->route('employee.index');
        }

        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
            ->select(
                'users.id',
                'respondents.firstname', 
                'respondents.lastname', 
                'respondents.email', 
                'respondents.employee_id', 
                'users.role',
                'users.force_password_change'
            )
            ->get();

        foreach($users as $user){
            if($user->id === Auth::user()->id){
                return view('users', ['users' => $users, 'user' => $user]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $defaultPassword = Str::random(12);
        $hashedPassword = Hash::make($defaultPassword);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'respondent_id' => ['required', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,20}$/'
            ],
            'role' => ['required']
        ]);

        $user['password'] = Hash::make($user['password']);

        User::create([
            'respondent_id' => $user['respondent_id'],
            'password' => $user['password'],
            'role' => $user['role'],
            'force_password_change' => true,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::join('respondents', 'users.respondent_id', '=', 'respondents.id')
            ->select(
                'users.id',
                'respondents.firstname', 
                'respondents.lastname', 
                'respondents.email', 
                'respondents.employee_id', 
                'users.role',
                'users.force_password_change'
            )
            ->get();

        foreach($users as $user){
            if($user->id === Auth::user()->id){
                return view('update-user', ['updatedUser' => $users, 'user' => $user]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        // dd('pogi poms');
        User::destroy($user);
        return redirect()->route('users.index');
        // dd($user);
    }
}
