<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function questionShow($id)
    {
    $data['question'] = Question::find($id);
        return view('question_show',$data);
    }
    public function filterByCategory(Request $request)
    {
        $data['questions'] = Question::where('category_id', $request->category_id)->get();
        $data["categories"] = Category::all();
        $data["selectedCategory"] = $request->category_id;

        return view('filter_by_category', $data);
    }
}
