<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
use App\Models\Subject;

class TeacherController extends Controller
{
    public function index(){
        $homeworks = Homework::with('subject')->orderBy('created_at', 'desc')->paginate(5);
        $subjects = Subject::paginate(5);
        return view('teacher.dashboard', compact('homeworks', 'subjects'));
    }

    public function showCreateForm(){
        $subjects = Subject::get();
        return view('teacher.create', compact('subjects'));
    }

    public function showEditForm($homework_id){
        $homework = Homework::with('subject')->where('id', $homework_id)->get();
        $subjects = Subject::get();

        return view('teacher.edit', compact('homework', 'subjects'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'required'
        ]);

        $homework = Homework::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'subject_id' => $validated['subject_id']
        ]);
    
        return redirect()->route('teacher.dashboard')->with('success', 'Homework created');
    }

    public function edit(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'subject_id' => 'required'
        ]);

        $homework = Homework::where('id', $request->route('homework_id'))->first();
        $homework->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'subject_id' => $validated['subject_id']
        ])
;
        return redirect()->route('teacher.dashboard')->with('success', 'Homework updated');
    }

    public function delete($homework_id){
        $homework = Homework::where('id', $homework_id);
        $homework->delete();

        return redirect()->route('teacher.dashboard')->with('success', 'Homework deleted');
    }

    public function addSubject(){
        return view('teacher.addSubject');
    }

    public function storeSubject(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject = Subject::create([
            'name' => $validated['name'],
        ]);
    
        return redirect()->route('teacher.dashboard')->with('success', 'Subject created');
    }

    public function deleteSubject($subject_id){
        $subject = Subject::where('id', $subject_id);
        $subject->delete();
        return redirect()->route('teacher.dashboard')->with('success', 'Subject deleted');
    }
}