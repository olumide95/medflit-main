<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $index = intval($user->usertype);

            switch ($index) {
                case 2:
                    return redirect()->intended('/patient');
                    break;
                case 3:
                    return redirect()->intended('/provider');
                    break;    
                case 4:
                    return redirect()->intended('/pharmacy');
                    break;
                case 5:
                    return redirect()->intended('/partner');
                    break;
                default: 
                    break;
            }
        }
        return view('auth.login');
    }

    public function payment() {
        return view('payment.pay');
    }

    
}
