<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Currency;
use App\Models\Wallet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('user.login');
    }

    public function dologin(Request $request)
    {
//
//        $this->validate($request , [],[]);

        if (Auth::attempt(['email' => $request->input('email') , 'password' => $request->input('password')])){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error' , 'ایمیل یا کلمه عبور صحیح نمی باشد');
    }

    public function register()
    {
        $currencies = Currency::all();

        return view('user.register' , compact('currencies'));
    }

    public function doregister(Request $request)
    {
//        $this->validate($request , [] , []);
        $user_data = [
            'name' => $request->input('name') ,
            'email' => $request->input('email') ,
            'password' => $request->input('password') ,
//
        ];
        $newUser = User::create($user_data);


        $wallet_data = [
            'user_id'  => $newUser->id ,
            'amount' => $request->input('amount') ,
            'currency_id' => $request->input('currency') ,
        ];
        $newWallet = Wallet::create($wallet_data);


        if ($newUser && $newUser instanceof User && $newWallet && $newWallet instanceof Wallet){
            Auth::login($newUser);
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error' , 'شما موفق به ثبت نام نشدید. لظفا دوباره تلاش کنید');
    }

    public function logout()
    {
        if (Auth::check()){
            Auth::logout();
            return redirect('/')->with('error' , 'شما با موفقیت خارج شدید');
        }

        return redirect('/')->with('error' , 'شما در سایت لاگین نیستید');

    }
}
