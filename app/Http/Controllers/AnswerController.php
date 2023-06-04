<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function create($id)
    {
        $data['question'] = Question::find($id);
        return view('answers.create',$data);
    }
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            "answer" => "required"
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['question_id'] = $id;
        if (Answer::create($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'You successfully submitted your answer');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }
}
