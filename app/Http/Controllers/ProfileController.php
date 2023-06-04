<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['title'] = "Profile";
        $data["user"] = Auth::user();
        return view('profile.index',$data);
    }
    public function update(SignupRequest $request)
    {
        // get authenticate user id
        $userId = Auth::user()->id;
        // get user from database using model
        $user = User::find($userId);
        // receive all validated data except password (password is not validated yet)
        $validatedData = $request->validated();

        // validate password and update database
        if ($validatedData['password'] != null) {
            $validated = $request->validate([
                'password' => ['confirmed', 'min:8'],
            ]);
            $validatedData['password'] = $validated['password'];
            if ($user->update($validatedData)) {
                return redirect()->back()->with('SUCCESS_MESSAGE', 'User updated successfully');
            }
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
        } else {
            unset($validatedData['password']);
            if ($user->update($validatedData)) {
                return redirect()->back()->with('SUCCESS_MESSAGE', 'User updated successfully');
            }
            return redirect()->back()->withInput()->with('ERROR_MESSAGE', 'Something went wrong! try again later.');
        }
    }
}
