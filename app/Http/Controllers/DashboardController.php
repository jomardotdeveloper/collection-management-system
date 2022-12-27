<?php

namespace App\Http\Controllers;

use App\Models\FinancingAgreement;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $lenders = User::where('role', 'lender')->count();
        $loaners = User::where('role', 'loaner')->count();
        $loans = FinancingAgreement::all()->count();
        $payments = Payment::all()->count();


        return view("backend.dashboard", compact('lenders', 'loaners', 'loans', 'payments'));
    }
}
