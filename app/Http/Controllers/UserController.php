<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::where("id", "!=", 1)->orderBy('created_at', 'DESC')->get();
        return view('users.index')->with('users', $users);
    }
}