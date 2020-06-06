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

    public function addwallet()
    {
        $userCurrency = Auth::user()->currency;
        $userCurrency = Currency::find($userCurrency);
        $user = Auth::user();
        return view('dashboard.wallet')->with('user' , $user)->with('userCurrency' , $userCurrency);
    }

    public function doaddwallet(Request $request)
    {
//      $this->validate($request , [] , []);

        $user = Auth::user();
        $newuseraddamount = $request->amount;
        $userwallet = Auth::user()->amount;
        $userwallet = $userwallet+$newuseraddamount;
        $user->amount = $userwallet;
        $user->save();
        return redirect()->route('dashboard')->with('msg' , 'موجودی کیف پول شما افزایش یافت');


    }
}
