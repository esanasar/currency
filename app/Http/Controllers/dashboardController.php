<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $user_id = Auth::user();
        $userWallets = $user_id->wallets()->get();

//        $userCurrency = $user_id->wallets()->get()->currency_id;
//        $userCurrency = Currency::find($userCurrency);
        return view('dashboard.index')->with('currencies' , $currencies)->with('userWallets' , $userWallets);
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
