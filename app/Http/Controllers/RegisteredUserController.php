<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        $userAttributes = $request->validate([
            'username' => 'required|unique:users,username|alpha_num',
            'email' => 'required|email|max:254|unique:users,email',
            'password' => ['required', Password::min(6)],
        ]);

        Auth::login(User::create($userAttributes));

        return redirect('/');
    }

    public function edit() {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request) 
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'username' => ['required', 'alpha_num', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:254', Rule::unique('users')->ignore($user->id)],
            'description' => 'max:65535'
        ]);

        $user->update([
            'username' => request('username'),
            'email' => request('email'),
            'description' => request('description'),
        ]);

        return redirect("/users/" . $user->username);
    }
}
