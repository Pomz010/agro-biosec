<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request, User $user){

        // Only save previous URL if it's not already saved
        if (!$request->session()->has('previous_url')) {
            $previousUrl = url()->previous();

            // You can further check and limit to only login or dashboard
            if (str_contains($previousUrl, 'login') || str_contains($previousUrl, 'dashboard')) {
                session(['previous_url' => $previousUrl]);
            }
        }

        return view('change-password', ['user' => $user]);
    }

    public function updatePassword(Request $request, User $user){
        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,20}$/',
                'confirmed',
            ],
        ]);

        if(Auth::user()->id !== $user->id){

            if (!$user) {
                return redirect()->route('login')->withErrors('You must be logged in to update your password.');
            }

            // Ensure we have an Eloquent model
            if (!($user instanceof \Illuminate\Database\Eloquent\Model)) {
                $user = \App\Models\User::find(Auth::id());
            }

            $user->password = Hash::make($request->password);
            $user->force_password_change = 1;
            $user->save();

            return redirect()->route('users.index');

        } else if(Auth::user()->id === $user->id) {

            if (!$user) {
                return redirect()->route('login')->withErrors('You must be logged in to update your password.');
            }

            // Ensure we have an Eloquent model
            if (!($user instanceof \Illuminate\Database\Eloquent\Model)) {
                $user = \App\Models\User::find(Auth::id());
            }

            $user->password = Hash::make($request->password);
            $user->force_password_change = 0;
            $user->save();

            return redirect()->route('employee.index');
        }
    }

    public function previousPage(){
        return url()->previous();
    }
}