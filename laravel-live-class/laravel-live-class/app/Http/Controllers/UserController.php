<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response('User not found', 404);
        }
        return view('user', compact('user'));
    }
}
