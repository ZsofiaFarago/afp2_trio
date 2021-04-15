<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return "Felhasznalo vagy jelszo nem egyezik.";
        } else {
            $request->session()->put('user', $user);
            return redirect()->route('home');
        }
    }

    function register(RegistrationRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
}
