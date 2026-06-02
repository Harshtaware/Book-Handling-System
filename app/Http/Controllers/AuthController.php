<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function showLogin()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $user = User::where(
        'email',
        $request->email
    )->first();

    if(
        $user &&
        Hash::check(
            $request->password,
            $user->password
        )
    )
    {
       session([
    'user_id' => $user->id,
    'name' => $user->name,
    'role' => $user->role
    ]);

        return redirect('/books');
    }

    return back()->with(
        'error',
        'Invalid Credentials'
    );
}


public function logout()
{
    session()->flush();

    return redirect('/login');
}

public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    return redirect('/login')
            ->with('success','Registration Successful');
}
}
