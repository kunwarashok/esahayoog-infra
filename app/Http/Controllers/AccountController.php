<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    private $accountTypes = ['esewa', 'imepay', 'khalti', 'fonepay', 'bank'];
    //
    public function create(Request $request, $id)
    {
        return view('entities.accounts.create')->with('accountTypes', $this->accountTypes)->with('entityId', $id);
    }
    public function store(Request $request)
    {

        $request->validate([
            'accountType' => 'required|in:' . implode(',', $this->accountTypes),
            'accountName' => 'required',
            'accountNumber' => 'required|max:16',

        ]);

        $account = new AccountDetail();
        $data = $request->all();


        $account->fill($data);
        $status = $account->save();

        if ($status) {
            Session::flash('success', 'Account Details added successfully.');
        } else {
            Session::flash('error', 'Failed to add account Details.');
        }

        return redirect()->route('entity');
    }
}