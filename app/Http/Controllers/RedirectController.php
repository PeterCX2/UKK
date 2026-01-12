<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        } else {
            return abort(403, 'Role tidak dikenali.');
        }
    }
}
