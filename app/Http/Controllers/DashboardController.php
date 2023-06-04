<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['title'] = "Dashboard";
        $data['totalUser'] = User::all()->count();
        $data['totalCategory'] = Category::all()->count();
        $data['totalQuestion'] = Question::all()->count();
        return view('dashboard', $data);
    }
}
