<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'DESC')->get();
        return view('transactions.index')->with('transactions', $transactions);
    }
}