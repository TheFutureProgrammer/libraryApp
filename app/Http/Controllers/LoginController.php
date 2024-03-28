<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('/welcome');
    }

    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // app/Http/Controllers/LoginController.php

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('index');
        } elseif ($user->role == 'user') {
            return redirect()->route('userdashboard');
        }
    }


        // If authentication fails, you might want to redirect back with an error message
        return redirect('/')->with('error', 'Invalid login credentials');
    }
}
