<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Cart;

class Carts extends Component
{
    public $cartitems;
    public function render()
    {
        return view('livewire.site.carts');
    }

    public static function deneme($food_id)
    {
        // Sepet ürünlerinden ilgili olanı bul
        global $item;
        $item = new Cart;
        $item = $item::where('food_id', $food_id)->first();
        return $item;
    }

    public function decreaseQuantity($food_id)
    {
        $item = $this->deneme($food_id);
        $item->quantity++;
        // Seçilen fiyatı bir arttır
        // $item->sizePricee += $item->food->price;
    }

    // public static function increaseQuantity($itemId, $sizePricee)
    // {
    //     $item = new Cart;
    //     $item = $item::first($itemId);
    //     $item->quantity += 1;
    //     $item->totalPrice += $sizePricee;
    //     $item->save();
    // }
}
