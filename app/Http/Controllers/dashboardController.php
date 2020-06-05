<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $userCurrency = Auth::user()->currency;
        $userCurrency = Currency::find($userCurrency);
        return view('dashboard.index')->with('currencies' , $currencies)->with('userCurrency' , $userCurrency);
    }
}
