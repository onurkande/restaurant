<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;

class CartController extends Controller
{
    function addFood(Request $request)
    {
        $food_id = $request->input('food_id');
        $quantity = $request->input('quantity');
        $totalPrice = $request->input('totalPrice');
        $sizePricee = $request->input('sizePricee');
        $sizeName = $request->input('sizeName');
        $selectedExtras = $request->input('selectedExtras');
        $selectedPrices = $request->input('selectedPrices');

        // $selectedExtras = explode(",", $selectedExtras);
        // dd(gettype($selectedExtras));
        //dd($selectedExtras);

        $selectedExtras=json_encode($selectedExtras,JSON_UNESCAPED_UNICODE);
        $selectedPrices=json_encode($selectedPrices,JSON_UNESCAPED_UNICODE);

        if(Auth::check())
        {
            $food_check = Food::where('id',$food_id)->first();

            if($food_check)
            {
                if(Cart::where('food_id', $food_id)->where('user_id', Auth::id())->exists())
                {
                    // return response()->json(['status' => $food_check->name." Already Added To Cart"]);
                    return redirect("menu_details/$food_id")->with('already_have',"$food_check->name Already Added To Cart");
                }else
                {
                    $cartItem = new Cart;
                    $cartItem->user_id = Auth::id();
                    $cartItem->food_id = $food_id;
                    $cartItem->quantity = $quantity;
                    $cartItem->totalPrice = $totalPrice;
                    $cartItem->sizePricee = $sizePricee;
                    $cartItem->sizeName = $sizeName;
                    $cartItem->selectedExtras = $selectedExtras;
                    $cartItem->selectedPrices = $selectedPrices;
                    $cartItem->save();
                    // return response()->json(['status' => $food_check->name." Added To Cart"]);
                    return redirect("menu_details/$food_id")->with('added_to_cart',"$food_check->name Added To Cart");
                }
            }
        }else
        {
            return response()->json(['status' => "Login To Continue"]);
        }
    }

    function viewcart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('cart',['cartitems'=>$cartitems]);
    }

    function deletefood(Request $request)
    {
        if(Auth::check())
        {
            $food_id = $request->input('food_id');
            if(Cart::where('food_id',$food_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('food_id',$food_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "food delete Successfully"]);
                // return redirect('cart')->with('status',"food delete Successfully");
            }
        }else
        {
            return response()->json(['status' => "Login To Continue"]);
        }
    }
}
