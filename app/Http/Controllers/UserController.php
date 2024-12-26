<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::orderBy('fullname')->paginate(5);

        return inertia('users/Index', compact('users'));
    }

    public function create() {
        return inertia('users/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required|unique:users,username',
            'fullname'=>'required',
            'designation'=>'required',
            'department'=>'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'designation' => $request->designation,
            'department' => $request->department,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/users')->with('Info','A new user has been created.');
    }
}
