<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;

class StudentController extends Controller
{
    public function index()
    {
        $homeworks = Homework::with('subject')->orderBy('created_at', 'desc')->paginate(5);
        return view('student.dashboard', compact('homeworks'));
    }

    public function done($homework_id){
        $homework = Homework::where('id', $homework_id);
        $homework->delete();

        return redirect()->route('student.dashboard')->with('success', 'Homework done');
    }
}
