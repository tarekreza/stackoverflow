<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Users list";
        $data['users'] = User::all();
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Create user";

        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SignupRequest $request)
    {
        $validatedData = $request->validated();
        if (User::create($validatedData)) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'User created successfully');
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
        $data["title"] = "Edit user";
        $data["user"] = User::find($id);
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SignupRequest $request, string $id)
    {
        $user = User::find($id);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->back()->with('SUCCESS_MESSAGE', 'User deleted successfully');
        }
    }
}
