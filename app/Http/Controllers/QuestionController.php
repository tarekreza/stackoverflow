<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "All questions";
        $data['questions'] = Question::all();
        return view('questions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Ask question";
        $data["categories"] = Category::all();

        return view('questions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        $validatedData = $request->validated();
        if (Question::create($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'You successfully submitted your question');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data["title"] = "Edit question";
        $data["categories"] = Category::all();
        $data["question"] = Question::find($id);

        return view('questions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, string $id)
    {
        $question = Question::find($id);
        $validatedData = $request->validated();
        if ($question->update($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Question updated successfully');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::find($id);
        if ($question->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'Question deleted successfully');
        }
    }
}
