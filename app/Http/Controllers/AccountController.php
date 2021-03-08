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
        $entityId = $data['entityId'];

        $account->fill($data);
        $status = $account->save();

        if ($status) {
            Session::flash('success', 'Account Details added successfully.');
        } else {
            Session::flash('error', 'Failed to add account Details.');
        }

        return redirect()->route('account.view', $entityId);
    }
    public function view(Request $request, $entityId)
    {
        $accounts = AccountDetail::where('entityId', $entityId)->orderBy('created_at', 'DESC')->get();
        return view('entities.accounts.view')->with('account', $accounts)->with('entityId', $entityId);
    }
    public function edit(Request $request, $id)
    {
        $account = AccountDetail::find($id);

        if (!$account) return redirect()->route("entity");

        return view('entities.accounts.edit')->with('accountTypes', $this->accountTypes)->with('account', $account);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'accountType' => 'required|in:' . implode(',', $this->accountTypes),
            'accountName' => 'required',
            'accountNumber' => 'required|max:16',
        ]);

        $account = AccountDetail::find($id);
        $entityId = $account->entityId;
        $data = $request->all();

        $account->fill($data);
        $status = $account->update();

        if ($status) {
            Session::flash('success', 'Account Details updated successfully.');
        } else {
            Session::flash('error', 'Failed to update Account Details.');
        }

        return redirect()->route('account.view', $entityId);
    }
    public function delete(Request $request, $id)
    {
        $account = AccountDetail::find($id);
        $entityId = $account->entityId;
        $status = $account->delete();
        if ($status) {
            Session::flash('success', 'Account Detail Deleted successfully.');
        } else {
            Session::flash('error', 'Failed to delete account Detail.');
        }
        return redirect()->route('account.view', $entityId);
    }
}