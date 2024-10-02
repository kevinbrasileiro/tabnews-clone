<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class ResetPasswordController extends Controller
{
    public function show() 
    {
        return view('auth.forgot-password');
    }

    public function send(Request $request)
    {
    $request->validate([
        'email' => ['required', 'email', 'max:254']
    ]);
 
    $status = Password::sendResetLink($request->only('email'));
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function edit(string $token)
    {
        dd('reached');
        return view('auth.reset-password', [
            'token' => $token,
        ]);
    }

    public function update(Request $request)
    {
        return false;

    }

}
