<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
    function index()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('check_out',['cartitems'=>$cartitems]);
    }
}
