<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        //validation
        $formData =  request()->validate([
            'name' => "required|max:255|min:3",
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')], //'required|max:255|min:3'
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $formData['remember_token'] = request()->_token;
        //store in db
        $user =  User::create($formData);

        Auth::login($user);

        return redirect('/')->with('status', "Welcome user " . $user->name);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('status', 'Good Bye');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin()
    {
        $formData =  request()->validate([
            'email' => ['required', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ], [
            'email.required' => "Your Email is required",
            'email.exists' => "Email doesn't exist!"
        ]);

        if (Auth::attempt($formData))
            return redirect('/')->with('status', "Welcome User " . Auth::user()->name);
        else
            return   redirect()->back()->withErrors(['email' => "Incorrect Credentials For This Email"]);
    }
}
