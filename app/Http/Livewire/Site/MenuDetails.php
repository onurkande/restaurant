<?php

namespace App\Http\Livewire\Site;
use Livewire\Component;

class MenuDetails extends Component
{
    public $sizePricee = 0;
    public $seciliPrice;
    public $foods;
    public $sizeName;
    public $totalPrice = 0; // Toplam fiyat
    public $extra;
    public $extraPrice;
    public $quantity = 1;
    public $selectedPrices = [];
    public $selectedExtras = [];

    public function render()
    {
        return view('livewire.site.menu-details');
    }

    public function sizePrice($value)
    {
        $price=json_decode($this->foods->price, TRUE);
        $firstPrice = $price[0];
        $SecondPrice = $price[1];
        $ThirdPrice = $price[2];

        $firstPrice = intval($firstPrice);
        $SecondPrice = intval($SecondPrice);
        $ThirdPrice = intval($ThirdPrice);

        // Boyut seçimi değiştiğinde fiyatı güncelleyin
        if ($value === 'large') {
            $this->sizePricee = $firstPrice; // İlgili fiyatı burada belirtin
            $this->seciliPrice = $firstPrice;
            $this->sizeName = $value;
        } elseif ($value === 'medium') {
            $this->sizePricee = $SecondPrice; // İlgili fiyatı burada belirtin
            $this->seciliPrice = $SecondPrice;
            $this->sizeName = $value;
        } elseif ($value === 'small') {
            $this->sizePricee = $ThirdPrice; // İlgili fiyatı burada belirtin
            $this->seciliPrice = $ThirdPrice;
            $this->sizeName = $value;
        }

        $this->totalPrice = $this->sizePricee + $this->extraPrice;
    }

    public function selectExtra($key, $price, $single)
    {
        // Burada $key ve $price parametrelerini kullanarak $extra ve $totalPrice değişkenlerini güncelleyebilirsiniz
        // Örneğin:
        if (isset($this->extra[$key])) {
            // Checkbox inputu kaldırıldığında
            unset($this->extra[$key]);
            $this->extraPrice -= $price;
            // Seçilen fiyatı $selectedPrices dizisinden kaldır
            $this->selectedPrices[] = array_diff($this->selectedPrices, [$price]);

            // Seçilen değeri $selectedExtraValues dizisinden kaldır
            $this->selectedExtras[] = array_diff($this->selectedExtras, [$single]);
        } else {
            // Checkbox inputu seçildiğinde
            $this->extra[$key] = $price;
            $this->extraPrice += $price;
            // Seçilen fiyatı $selectedPrices dizisine ekle
            $this->selectedPrices[] = $price;

            // Seçilen değeri $selectedExtraValues dizisine ekle
            $this->selectedExtras[] = $single;
        }
        // $this->selectedExtras = array_values($this->extraNames($this->extra));

        $this->totalPrice = $this->sizePricee + $this->extraPrice;
    }

    public function increaseQuantity()
    {
        $this->quantity++;
        $this->sizePricee = $this->sizePricee + $this->seciliPrice;
        $this->totalPrice = $this->sizePricee + $this->extraPrice;
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1)
        {
            if ($this->totalPrice > $this->sizePricee)
            {
                $this->quantity--;
                $this->sizePricee = $this->sizePricee - $this->seciliPrice;
            }else
            {
                $this->quantity--;
                $this->sizePricee = $this->sizePricee - $this->seciliPrice;
            }
        }
        $this->totalPrice = $this->sizePricee + $this->extraPrice;
    }

    public function addToCart()
    {
        $this->emit('CartAddedUpdated');
    }
}
