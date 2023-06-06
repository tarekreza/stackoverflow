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
            return redirect()->route('questionShow',$id)->with('SUCCESS_MESSAGE', 'You successfully submitted your answer');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }

    // reply from dashboard
    public function reply($id)
    {
        $data['title'] = "Reply";
        $data['question'] = Question::find($id);
        return view('answers.reply',$data);
    }
    public function storeReply(Request $request, $id)
    {
        $validatedData = $request->validate([
            "answer" => "required"
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['question_id'] = $id;
        if (Answer::create($validatedData)) {
            return redirect()->route('user.questions.show',$id)->with('SUCCESS_MESSAGE', 'You successfully submitted your reply');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }

    public function correctAnswer($id)
    {

        $answer = Answer::find($id);
        $answer->update([
            'is_correct' => true,
        ]);
        return redirect()->back();
    }
    public function deleteAnswer($id)
    {
        $answer = Answer::find($id);
        if ($answer->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Answer deleted successfully');
        }
    }
}
