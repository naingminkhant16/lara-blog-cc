<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $formData =  request()->validate([
            'name' => "required|max:255|min:3",
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')], //'required|max:255|min:3'
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $formData['remember_token'] = request()->_token;
        User::create($formData);
        return redirect('/');
    }
}
