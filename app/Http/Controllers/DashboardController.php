<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // application logic to retrive and display dasboard data
        // send data to dashboard view
        $loggedInUserName = auth()->user()->name;
        $loggedInUserEmail = auth()->user()->email;
        // dd($loggedInUserName);
        // $name = 'Test Kunwar';

        return view('dashboard.index')->with('username', $loggedInUserName)->with('email', $loggedInUserEmail);
    }
}
