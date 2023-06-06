<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\QuestionRequest;
use App\Models\Answer;

class UserQuestionController extends Controller
{
    public function index()
    {
        $data["title"] = "All questions";
        $userId = Auth::user()->id;
        $data['questions'] = Question::where('user_id', $userId)->latest()->get();
        return view('user_questions.index', $data);
    }
    public function create()
    {
        $data["title"] = "Ask question";
        $data["categories"] = Category::all();

        return view('user_questions.create', $data);
    }
    public function store(QuestionRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::user()->id;
        if (Question::create($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'You successfully submitted your question');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }
    public function show($id)
    {
        $data['title'] = "Question and Answer";
        $data['question'] = Question::find($id);
        $data['answers'] = Answer::where('question_id', $id)->latest()->get();

        return view('user_questions.show',$data);
    }
    public function edit(string $id)
    {
        $data["title"] = "Edit question";
        $data["categories"] = Category::all();
        $data["question"] = Question::find($id);

        return view('user_questions.edit', $data);
    }
    public function update(QuestionRequest $request, string $id)
    {
        $question = Question::find($id);
        $validatedData = $request->validated();
        if ($question->update($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Question updated successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }
    public function destroy(string $id)
    {
        $question = Question::find($id);
        if ($question->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Question deleted successfully');
        }
    }
}
