<?php

// Controllers Path
namespace App\Http\Controllers\Auth;

// Modules to use
use App\Http\Controllers\Controller; // For setting 'Controllers' folder as default
use Illuminate\Http\Request; // For requests
use Illuminate\Support\Facades\Auth; // For checking and getting data of 'auth'ed user

class LogoutController extends Controller
{
    public function index()
    {
        // Check, if user ARE NOT signed in redirect him into / page
        if (!Auth::check()) {
            return redirect('/');
        }else {
            return redirect('/dashboard');
        }
    }
}
