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
        // $category_id = $request->validate([
        //     'category_id' => 'exists:categories,id'
        // ]);
        $category_id = $request['category_id'];
        $data['questions'] = Question::where('category_id', $category_id)->get();
        $data["categories"] = Category::all();
        $data["selectedCategory"] = $category_id;

        return view('filter_by_category', $data);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $data['questions'] = Question::where('title', 'LIKE', "%$query%")->get();
        $data["categories"] = Category::all();

        return view('filter_by_category', $data);

    }
}
