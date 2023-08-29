<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;
use App\Models\Cart;

class Carts extends Component
{
    public $cartitems;

    public $subtotal = 0;

    public function render()
    {
        return view('livewire.site.carts');
    }

    public function mount()
    {
        // Sepetinizdeki ürünleri al
        $cartitems = Cart::where('user_id', auth()->user()->id)->get();

        // Her ürün için totalPrice değerini subtotal'a ekle
        foreach ($cartitems as $item) {
            $this->subtotal += $item->totalPrice;
        }
    }

    public function decreaseQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        $seciliPrice = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->value('seciliPrice');
        if($cartData)
        {
            $cartData->decrement('quantity');
            $miktar = $seciliPrice;
            $cartData->decrement('sizePricee',$miktar);
            $cartData->decrement('totalPrice',$miktar);
            $this->subtotal -= $miktar;
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 200
            ]);
        }
    }

    public function increaseQuantity(int $cartId)
    {
        $cartData = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->first();
        $seciliPrice = Cart::where('id',$cartId)->where('user_id', auth()->user()->id)->value('seciliPrice');
        if($cartData)
        {
            $cartData->increment('quantity');
            $miktar = $seciliPrice;
            $cartData->increment('sizePricee',$miktar);
            $cartData->increment('totalPrice',$miktar);
            $this->subtotal += $miktar;
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 200
            ]);
        }
    }

    public function remoweCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id',auth()->user()->id)->where('id',$cartId)->first();
        if($cartRemoveData)
        {
            $cartRemoveData->delete();

            $this->emit('CartAddedUpdated');
        }
    }
}
