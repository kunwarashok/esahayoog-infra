<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = User::orderBy('created_at', 'DESC')->get();
        $entities = Entity::orderBy('created_at', 'DESC')->get();

        $totalEntities = Entity::count();
        $totalUsers = User::count();
        $totalTransactions = Transaction::count();

        return view('dashboard.index')
            ->with('dashboard', $dashboard)
            ->with('entities', $entities)
            ->with('totalEntities', $totalEntities)
            ->with('totalUsers', $totalUsers)
            ->with('totalTransactions', $totalTransactions);
    }
}